<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\UserController;
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
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::resource('kehadiran', KehadiranController::class)->middleware('auth');

// search
Route::get('/search',[KehadiranController::class,'search'])->name('search');

// home
Route::get('/',function(){
    return view('pages.index');
});


// admin Create User
Route::resource('user', UserController::class)->middleware('auth');

// Admin Home
Route::get('/dashboard',function(){
    return view('pages.admin.dashboardAdmin');
})->name('admin.index');
