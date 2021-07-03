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

        $workouts = Auth::user()->workouts()->with('exercise')->get();
        

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
                        'name' => $exercise->exerciseName,
                    ]);
    
                    $newExercise->logs()->create([
                        'sets'      => $exercise->sets,
                        'reps'      => $exercise->reps,
                        'weight'    => $exercise->weight,
                    ]);
    
                    $workout->exercise()->attach( $newExercise->id );
    
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
                        'image_url'   => 'storage/recipe-imgs/' . $fileName
                    ]);

                }

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

}
