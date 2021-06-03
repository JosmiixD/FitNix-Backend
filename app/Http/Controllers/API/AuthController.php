<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    

    public function register( Request $request ) {

        $fields = $request->validate([
            'name'      => 'required|string',
            'last_name' => 'required|string',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name'      => $fields['name'],
            'last_name' => $fields['last_name'],
            'email'     => $fields['email'],
            'password'  => Hash::make( $fields['password'] ),
        ]);

        $token = $user->createToken('authtoken')->plainTextToken;

        return response()->json([
            'ok'        => true,
            'message'   => 'Bienvenido ' . $user->name,
            'user'      => $user,
            'token'     => $token,
        ], 201);

    }


    public function login( Request $request ) {

        $fields = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|string',
        ]);

        //CHECK IF EMAIL IS REGISTERED IN DB
        $user = User::where('email', $fields['email'])->first();

        if( !$user || !Hash::check( $fields['password'], $user->password ) ) {

            return response()->json([
                'ok'        => false,
                'message'   => 'Las credenciales que proporciono no coinciden, revise e intentelo nuevamente',
            ], 401);

        }

        $token = $user->createToken('authtoken')->plainTextToken;

        return response()->json([
            'ok'        => true,
            'message'   => 'Continua con tus objetivos',
            'user'      => $user,
            'token'     => $token,
        ], 200);

    }


    public function tokenRenew() {


        $user = Auth::user();

        $token = $user->createToken('authtoken')->plainTextToken;

        return response()->json([
            'ok'        => true,
            'message'   => 'Token actualizado correctamente',
            'user'      => $user,
            'token'     => $token,
        ], 200);


    }


}
