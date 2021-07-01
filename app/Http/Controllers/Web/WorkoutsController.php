<?php

namespace App\Http\Controllers\Web;

use App\Models\Workout;
use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorkoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'pages.workouts.create', new Workout );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $workout = Workout::create([
            'name'      => $request->name,
            'user_id'   => Auth::user()->id,
            'day'       => $request->day
        ]);
        

        for ($i=1; $i < 5; $i++) { 
            
            $exercise = Exercise::create([
                'name' => $request["exercise_name_{$i}"]
            ]);


            $exercise->logs()->create([
                'sets'      => $request["exercise_sets_{$i}"],
                'reps'      => $request["exercise_reps_{$i}"],
                'weight'    => $request["exercise_weight_{$i}"],
            ]);

            $workout->exercise()->attach( $exercise->id );

        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
