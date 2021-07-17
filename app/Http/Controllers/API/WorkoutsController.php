<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Workout;
use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;


class WorkoutsController extends Controller
{
    

    public function workouts() {

        $workouts = Auth::user()->workouts()->with('exercises')->get();
        

        return response()->json([
            'ok'    => true,
            'message' => 'Rutinas encontradas',
            'workouts' => $workouts
        ]);

    }


    public function store( Request $request ) {

        
        try {

            $exercises = json_decode( $request->exercises );
                
            $workout  = Auth::user()->workouts()->create([
                'name' => $request->name,
                'day'  => 1
            ]);

            if( $workout ) {
                foreach ($exercises as $key => $exercise) {
                
                    $newExercise = Exercise::create([
                        'name'  => $exercise->exerciseName,
                        'order' => $key
                    ]);
    
                    $newExercise->logs()->create([
                        'sets'      => $exercise->sets,
                        'reps'      => $exercise->reps,
                        'weight'    => $exercise->weight,
                    ]);
    
                    $workout->exercises()->attach( $newExercise->id );
    
                }

                //If User sends an image

                if( $request->hasFile('image') ) {


                    $date           = Carbon::now();
                    $targets        = array(' ', ':');
                    $date           = str_replace($targets, '-', $date);

                    $image          = $request->file('image');
                    $fileName       = "Workout-img-{$date}.{$image->getClientOriginalExtension()}";
                    $img            = Image::make($image->getRealPath());

                    $img->resize(600, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    $img->stream(); // <-- Encodes the image
                    $upload_image = Storage::disk('local')->put('public/workouts/'.$fileName, $img, 'public');

                    $update_image = $workout->update([
                        'image_url'   => 'storage/workouts/' . $fileName
                    ]);

                }

                $workout->refresh();
                $workout->load('exercises');

                return response()->json([
                    'ok'        => true,
                    'message'   => 'Rutina creada',
                    'workout'   => $workout
                ], 201);

            } else {

                return response()->json([
                    'ok'        => false,
                    'message'   => 'Ocurrio un error al guardar la rutina, intente más tarde',
                    'workout'   => []
                ], 401);

            }

        } catch (\Throwable $th) {
            
            return response()->json([
                'ok'        => false,
                'message'   => $th->getMessage(),
            ], 401);
        }

    }

    public function update( Request $request ) {
        try {
            
            $workout = Auth::user()->workouts()->findOrFail($request->id);

            $workout_image = explode('storage/', $workout->image_url);
            $workout_old_image = $workout_image[1];

            //Change workout name but dont save to DB
            $workout->name = $request->name;

            $exercises = json_decode( $request->exercises);

            foreach ($exercises as $key => $exercise) {

                //If exercise already exists in workout then update its values
                if( $exercise->id != 0 ) {
                    
                    //Find exercise
                    $exerciseDB = $workout->exercises()->find($exercise->id);

                    //Update exercise values
                    $exerciseDB->update([
                        'name'  => $exercise->exerciseName,
                        'order' => $key
                    ]);

                }else { //If is a new exercise in workout
                    
                    $newExercise = Exercise::create([
                        'name'  => $exercise->exerciseName,
                        'order' => $key
                    ]);

                    $newExercise->logs()->create([
                        'sets'  => $exercise->sets,
                        'reps'  => $exercise->reps,
                        'weight'=> $exercise->weight,
                    ]);

                    $workout->exercises()->attach( $newExercise->id );
                }
            }
            // If user wants to change workout image then delete the old one to avoid oversize
            if ($request->hasFile('image')) {
                $date           = Carbon::now();
                $targets        = array(' ', ':');
                $date           = str_replace($targets, '-', $date);

                $image          = $request->file('image');
                $fileName       = "Workout-img-{$date}.{$image->getClientOriginalExtension()}";
                $img            = Image::make($image->getRealPath());

                $img->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $img->stream(); // <-- Encodes the image
                $upload_image = Storage::disk('local')->put('public/workouts/'.$fileName, $img, 'public');


                $workout->image_url = 'storage/workouts/' . $fileName;

                //IF PROFILE PICTURE WAS UPDATED DELETE OLD FILE
                $image_path = "public/{$workout_old_image}"; 
                Storage::delete($image_path);

            }

            $workout->save();

            $workout->refresh();
            $workout->load('exercises');

            return response()->json([
                'ok'        => true,
                'message'   => 'Rutina actualizada correctamente',
                'workout'   => $workout
            ], 200);


        } catch (\Throwable $th) {
            return response()->json([
                'ok'        => false,
                'message'   => $th->getMessage(),
            ], 401);
        }
    }

}
