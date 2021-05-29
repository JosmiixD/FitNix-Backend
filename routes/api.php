<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//PUBLIC ROUTES 

// AUTHENTICATION ROUTES
Route::post('/register', [AuthController::class, 'register'])->name('user.create');
Route::post('/login', [AuthController::class, 'login'])->name('user.login');

Route::get('/time', function() {
    return Carbon::parse( '01-November-1996')->format('d-M-Y');
});



// ROUTES PROTECTED BY AUTH:SANCTUM
Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::get('/prueba', function() {
        return response([
            'message' => 'Esta funcionando'
        ]);
    });

});