<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TVController;
use Illuminate\Support\Facades\Route;

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

Route::view('/movie',                   'show')->name('movie.show');

Route::get('/',                                 [MovieController::class, 'index'])->name('movies.index');
Route::get('/movie/{id}',                       [MovieController::class, 'show'])->name('movies.show');

Route::get('/actors',                           [ActorController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page?}',              [ActorController::class, 'index'])->name('actors.index');
Route::get('/actor/{id}',                       [ActorController::class, 'show'])->name('actors.show');

Route::get('/tv',                               [TVController::class, 'index'])->name('tv.index');
Route::get('/tv/{id}',                          [TVController::class, 'show'])->name('tv.show');