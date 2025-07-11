<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KehadiranController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// login
Route::get('/login',[AuthController::class,'index'])->name('login.index');
Route::post('/login',[AuthController::class,'login'])->name('auth.login');

Route::resource('kehadiran', KehadiranController::class)->middleware('auth');

