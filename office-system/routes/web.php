<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

/* Route::get('/', function () {
    return view('home');
}); */

Route::get('/', [PostsController::class, 'index']);
Route::post('/', [PostsController::class, 'get']);
Route::post('/search', [PostsController::class, 'search']);
Route::post('/filter', [PostsController::class, 'filter']);
Route::post('/sort', [PostsController::class, 'sort']);
Route::post('/sorton', [PostsController::class, 'sorton']);
Route::post('/se', [PostsController::class, 'se']);
