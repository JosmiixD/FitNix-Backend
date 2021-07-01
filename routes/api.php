<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RecipesController;
use App\Http\Controllers\API\WorkoutsController;

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
Route::post('/register', [AuthController::class, 'register'])->name('api.user.create');
Route::post('/login', [AuthController::class, 'login'])->name('api.user.login');




// ROUTES PROTECTED BY AUTH:SANCTUM
Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::post('/user/save-info', [UserController::class, 'saveInformation'])->name('api.user.save-info');
    Route::get('/token-renew', [AuthController::class, 'tokenRenew'])->name('api.token.renew');


    Route::get('/categories', [RecipesController::class, 'categories'])->name('api.categories.get');
    Route::get('/recipes/{id}', [RecipesController::class, 'recipes'])->name('api.recipes.get');
    Route::get('/workouts', [WorkoutsController::class, 'workouts'])->name('api.workouts.get');

});