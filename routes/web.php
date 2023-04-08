<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\TvShowController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MoviesController::class, 'index'])->name('movies');
Route::get('movie/{id}', [MoviesController::class, 'show'])->name('movies.show');


Route::get('tv', [TvShowController::class, 'index'])->name('tv');
Route::get('tv/{id}', [TvShowController::class, 'show'])->name('tv.show');


Route::get('actors', [ActorsController::class, 'index'])->name('actors');
Route::get('actors/page/{page?}', [ActorsController::class, 'index']);
Route::get('actors/{id}/', [ActorsController::class, 'show'])->name('actors.show');
