<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\RecipesController;
use App\Http\Controllers\Web\ChallengesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['role:superadmin']], function () {

    Route::get('/get-recipes', [RecipesController::class, 'getRecipes'])->middleware(['auth'])->name('recipes.get');
    Route::resource('recipes', RecipesController::class)->middleware(['auth'])->names('recipes');


    Route::get('/get-challenges', [ChallengesController::class, 'getChallenges'])->middleware(['auth'])->name('challenges.get');
    Route::resource('challenges', ChallengesController::class)->middleware(['auth'])->names('challenges');


    
});
