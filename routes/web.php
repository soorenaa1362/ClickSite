<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/form', [IndexController::class, 'index'])->middleware('auth');
Route::post('/store', [IndexController::class, 'store']);
Route::post('/upload', [IndexController::class, 'upload']);

// Route::get('/create/post', [HomeController::class, 'create']);
// Route::post('/post', [HomeController::class, 'store']);
// Route::get('/delete/{id}', [HomeController::class, 'destroy']);

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/delete/{id}', [UserController::class, 'delete']);

Route::get('/user/deleted', [UserController::class, 'deletedIndex']);
Route::get('/user/deleted/restore/{id}', [UserController::class, 'deletedRestore']);
Route::get('/user/deleted/force/{id}', [UserController::class, 'deletedForce']);


Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
Route::post('/post/create', [PostController::class, 'create'])->name('post.create');
Route::get('/post/list', [PostController::class, 'list'])->name('post.list');



