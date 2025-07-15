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
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::resource('kehadiran', KehadiranController::class)->middleware('auth');

Route::get('/dashboard',function(){
    return view('pages.admin.dashboardAdmin');
});

// search
Route::get('/search',[KehadiranController::class,'search'])->name('search');

// home
Route::get('/',function(){
    return view('pages.index');
});

// user
Route::get('/dashboard/user',function(){
    return view('pages.admin.user.index');
});
