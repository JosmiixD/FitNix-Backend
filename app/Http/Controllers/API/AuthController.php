<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    

    public function register( Request $request ) {

        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make( $fields['password'] ),
        ]);

        $token = $user->createToken('authtoken')->plainTextToken;

        return response()->json([
            'title' => 'Usuario creado correctamente',
            'message' => 'Bienvenido ' . $user->name,
            'user' => $user,
            'token' => $token,
        ], 201);

    }


    public function login( Request $request ) {

        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        //CHECK IF EMAIL IS REGISTERED IN DB
        $user = User::where('email', $fields['email'])->first();

        if( !$user || Hash::check( $fields['password'], $user->password ) ) {

            return response()->json([
                'title' => 'Credenciales invalidas',
                'message' => 'Por favor revise sus datos e intentelo nuevamente',
            ], 401);

        }

        $token = $user->createToken('authtoken')->plainTextToken;

        return response()->json([
            'title' => 'Bienvenido',
            'message' => 'Continua con tus objetivos' . $user->name,
            'user' => $user,
            'token' => $token,
        ], 200);

    }


}
