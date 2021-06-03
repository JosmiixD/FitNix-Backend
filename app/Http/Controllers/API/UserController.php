<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\User;
use App\Models\WeightLog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    

    public function saveInformation( Request $request ) {

        $fields = $request->validate([
            'birthday'      => 'required',
            'weight'        => 'required',
            'height'        => 'required',
            'gender'        => 'required|string',
            'level'         => 'required|string',
        ]);

        try {
            
            $user = Auth::user();

            $levels     = [ "Principiante", "Intermedio", "Avanzado" ];
            $genders    = [ "Masculino", "Femenino", "Prefiero no decirlo" ];

            $user->update([
                'birthday'  => Carbon::parse( $fields['birthday'] ),
                'height'    => $fields['height'],
                'gender'    => array_search( $fields['gender'], $genders ),
                'level'     => array_search( $fields['level'], $levels ),
            ]);


            $user->weightLogs()->create([
                'weight' => $fields['weight'],
            ]);


            return response()->json([
                'ok'        => true,
                'message'   => 'Su información ha sido guardada correctamente',
                'user'      => $user,
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'ok'        => false,
                'message'   => $th->getMessage(),
            ], 401);
        }

    }

}
