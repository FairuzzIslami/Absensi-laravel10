<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
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



// home
Route::get('/', function () {
    return view('pages.index');
});
// login
Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard admin
    Route::get('/dashboard/admin', [DashboardController::class, 'index'])->name('admin.index');

    // CRUD User
    Route::resource('user', UserController::class);
    Route::get('/search/user', [UserController::class, 'search'])->name('search');

    // Export data
    Route::get('/users/export/pdf', [UserController::class, 'exportPdf'])->name('users.export.pdf');
    Route::get('/users/export/csv', [UserController::class, 'exportCsv'])->name('users.export.csv');

    // CRUD Kelas
    Route::resource('/kelas', KelasContoller::class);
});


// Guru
Route::middleware(['auth', 'role:guru'])->group(function () {
    // Dashboard Guru
    Route::get('/dashboard/guru', [GuruController::class, 'index'])->name('guru.index');

    // view kehadiran siswa
    Route::get('guru/kelas', [GuruController::class, 'kelas'])->name('guru.kelas');
    Route::get('guru/kelas/{id}', [GuruController::class, 'detailSiswa'])->name('guru.kelas.detail');

    // Guru absen
    Route::get('/guru/absensi', [GuruController::class, 'absensi'])->name('guru.absensi');
    Route::post('/guru/absensi', [GuruController::class, 'storeAbsensi'])->name('guru.absensi.store');

    // Riwayat
    Route::get('/guru/riwayat', [GuruController::class, 'riwayat'])->name('guru.riwayat');
});
