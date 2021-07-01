<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

}
