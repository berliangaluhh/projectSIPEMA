<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AdminController;

// Guest Routes (only non-authenticated users can access)
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('landing');
    });

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/forgetpassword', [AuthController::class, 'showForgetPassword']);
    Route::post('/forgetpassword', [AuthController::class, 'forgetPassword']);
});

// Authenticated Routes (requires login)
Route::middleware('auth')->group(function () {
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Mahasiswa (Pengguna) Dashboard & Action Routes
    Route::middleware('can:is-mahasiswa')->group(function () {
        Route::get('/dashboard', [PenggunaController::class, 'dashboard'])->name('dashboard');
        
        Route::get('/pengaduan', [PenggunaController::class, 'showPengaduan']);
        Route::post('/pengaduan', [PenggunaController::class, 'storePengaduan']);
        
        Route::get('/riwayat', [PenggunaController::class, 'riwayat']);
        Route::get('/detailriwayat/{id}', [PenggunaController::class, 'detailRiwayat']);
        Route::get('/status', [PenggunaController::class, 'status']);
        
        Route::get('/profil', [PenggunaController::class, 'showProfil']);
        Route::get('/editprofil', [PenggunaController::class, 'editProfil']);
        Route::post('/editprofil', [PenggunaController::class, 'updateProfil']);
        
        Route::get('/gantipassword', [PenggunaController::class, 'showGantiPassword']);
        Route::post('/gantipassword', [PenggunaController::class, 'updatePassword']);
    });

    // Admin Dashboard & Action Routes
    Route::middleware('can:is-admin')->group(function () {
        Route::get('/dashboardadmin', [AdminController::class, 'dashboard'])->name('dashboardadmin');
        Route::get('/datapengaduan', [AdminController::class, 'datapengaduan']);
        
        Route::get('/detailpengaduan/{id}', [AdminController::class, 'detailpengaduan']);
        Route::get('/detailpengaduanselesai/{id}', [AdminController::class, 'detailpengaduanselesai']);
        Route::post('/detailpengaduan/{id}/status', [AdminController::class, 'updateStatus']);
        
        Route::get('/belumdiproses', [AdminController::class, 'belumdiproses']);
        Route::get('/diproses', [AdminController::class, 'diproses']);
        Route::get('/selesai', [AdminController::class, 'selesai']);
    });
});