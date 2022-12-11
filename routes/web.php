<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShowroomController;
use App\Models\Showroom;

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
    return view('home', ['login' => true]);
});

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest');

Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'create'])->middleware('guest');

Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/items', [ShowroomController::class, 'index'])->middleware('auth');

Route::get('/add', [ShowroomController::class, 'add'])->middleware('auth');

Route::post('/items', [ShowroomController::class, 'create'])->middleware('auth');

Route::put('/items/{id}', [ShowroomController::class, 'update'])->middleware('auth');

Route::get('/items/{id}', [ShowroomController::class, 'detail'])->middleware('auth');

Route::get('/items/{id}/edit', [ShowroomController::class, 'edit'])->middleware('auth');

Route::delete('/items/{id}/delete', [ShowroomController::class, 'delete'])->middleware('auth');

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
Route::put('/profile', [UserController::class, 'update'])->middleware('auth');