<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasContoller;
use App\Http\Controllers\KodeAbsensiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalMengajarController;


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
    return view('pages.home');
});

// login
Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Profile
Route::get('/profil', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/profil/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/profil/password', [ProfileController::class, 'passwordForm'])->name('password.change')->middleware('auth');
Route::post('/profil/password', [ProfileController::class, 'updatePassword'])->name('password.update')->middleware('auth');


// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard admin
    Route::get('/dashboard/admin', [AdminController::class, 'dashboardAdmin'])->name('admin.index');

    // CRUD User
    Route::resource('/admin/user', UserController::class);
    Route::get('/admin/search/user', [UserController::class, 'search'])->name('search');

    // Export data user
    Route::get('/admin/users/export/pdf', [UserController::class, 'exportPdf'])->name('users.export.pdf');
    Route::get('/admin/users/export/csv', [UserController::class, 'exportCsv'])->name('users.export.csv');

    // CRUD Kelas
    Route::resource('/admin/kelas', KelasContoller::class);

    Route::get('/admin/kehadiran', [AdminController::class, 'kehadiran'])->name('admin.kehadiran.index');
    // export data kehadiran
    Route::get('/admin/kehadiran/export-pdf', [AdminController::class, 'exportPdfKehadiran'])->name('admin.kehadiran.export');

    // Input kode
    Route::get('/kode', [KodeAbsensiController::class, 'index'])->name('admin.kode.index');
    Route::get('/admin/kode', [KodeAbsensiController::class, 'create'])->name('admin.kode.create');
    Route::post('/admin/kode', [KodeAbsensiController::class, 'store'])->name('admin.kode.store');
    Route::delete('/kode/{id}', [KodeAbsensiController::class, 'destroy'])->name('admin.kode.destroy');

     // Jadwal Mengajar
    Route::get('/admin/jadwal', [JadwalMengajarController::class, 'index'])
        ->name('jadwal.index');

    Route::get('/admin/jadwal/create', [JadwalMengajarController::class, 'create'])
        ->name('jadwal.create');

    Route::post('/admin/jadwal', [JadwalMengajarController::class, 'store'])
        ->name('jadwal.store');

    Route::put('/admin/jadwal/{id}', [JadwalMengajarController::class, 'update'])
    ->name('jadwal.update');

    Route::delete('/admin/jadwal/{id}', [JadwalMengajarController::class, 'destroy'])
    ->name('jadwal.destroy');
});


// Guru
Route::middleware(['auth', 'role:guru'])->group(function () {
    // Dashboard Guru
    Route::get('/dashboard/guru', [GuruController::class, 'index'])->name('guru.index');

    // view kehadiran siswa
    Route::get('guru/kelas', [GuruController::class, 'kelas'])->name('guru.kelas');
    Route::get('guru/kelas/{id}', [GuruController::class, 'detailSiswa'])->name('guru.kelas.detail');
    Route::post('/guru/absen-siswa', [GuruController::class, 'absenSiswa'])
    ->name('guru.absen.siswa');

    // Guru absen
    Route::get('/guru/absensi', [GuruController::class, 'absensi'])->name('guru.absensi');
    Route::post('/guru/absensi', [GuruController::class, 'storeAbsensi'])->name('guru.absensi.store');

    // Riwayat
    Route::get('/guru/riwayat', [GuruController::class, 'riwayat'])->name('guru.riwayat');

    // Export PDF & CSV
    Route::get('/guru/kelas/{id}/export/pdf', [GuruController::class, 'exportPdf'])->name('guru.kelas.export.pdf');
    Route::get('/guru/kelas/{id}/export/csv', [GuruController::class, 'exportCsv'])->name('guru.kelas.export.csv');

    // kode absen
    Route::get('/guru/kode-absen', [GuruController::class, 'formKodeAbsen'])->name('guru.kode.form');
    Route::post('/guru/kode-absen', [GuruController::class, 'cekKodeAbsen'])->name('guru.kode.cek');

    // Guru lihat jadwal mengajar sendiri
    Route::get('/guru/jadwal', [GuruController::class, 'jadwalMengajar'])
        ->name('guru.jadwal');
});

// siswa
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/dashboard/siswa', [SiswaController::class, 'dashboard'])->name('siswa.index');
    Route::get('/siswa/absen', [SiswaController::class, 'formAbsen'])->name('siswa.absen.form');
    Route::post('/siswa/absen', [SiswaController::class, 'absen'])->name('siswa.absen.store');
    Route::get('/siswa/riwayat', [SiswaController::class, 'riwayat'])->name('siswa.riwayat');

    // Kode absen
    Route::get('siswa/absen/kode', [SiswaController::class, 'formKodeAbsen'])->name('siswa.absen.kode');
    Route::post('siswa/absen/kode', [SiswaController::class, 'cekKodeAbsen'])->name('siswa.absen.kode.cek');
});
