<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\KelasContoller;
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



// home
Route::get('/',function(){
    return view('pages.index');
});


// admin Create User
Route::resource('user', UserController::class)->middleware('auth');
Route::get('/search/user',[UserController::class,'search'])->name('search');

// export pdf
Route::get('/users/export/pdf', [UserController::class, 'exportPdf'])->name('users.export.pdf');

// csv
Route::get('/users/export/csv', [UserController::class, 'exportCsv'])->name('users.export.csv');



// Admin Home
Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.index')->middleware('auth');

// admin kelas
Route::resource('/kelas',KelasContoller::class)->middleware('auth');
