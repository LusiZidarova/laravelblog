<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\PagesController;
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


Route::get('/', [\App\Http\Controllers\PagesController::class, 'index']);
//Route::resource('/blog',  [PostsController::class, 'index']);

Route::get('/blog', [PostsController::class, 'index']);
Route::get('/blog/create', [PostsController::class, 'create']);
Route::post('/blog/store', [PostsController::class, 'store']);
Route::get('/blog/index/{$id}', [PostsController::class, 'index']);
Route::get('/blog/{$id}/list',  [PostsController::class, 'showPostCat']);
Route::post('/blog/delete/{$id}', [PostsController::class, 'destroy']);
Route::get('/blog/index', [PostsController::class, 'index']);
Route::get('/blog/{$id}/edit',  [PostsController::class, 'edit']);
Route::get('blog/{$id}',  [PostsController::class, 'show']);


 Auth::routes(); 

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

