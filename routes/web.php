<?php

use App\Http\Controllers\KehadiranController;
use App\Models\KehadiranDetail;
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

Route::get('/', function(){
    return view('pages.index');
})->name('home'); // name untuk nama urlnya di blade

Route::resource('kehadiran', KehadiranController::class);

Route::delete('/kehadiran-detail/{id}',[KehadiranDetail::class,'destroy'])->name('kehadiran-detail.destroy');

Route::get('/login',function(){
    return view('pages.auth.login');
})->name('login');
