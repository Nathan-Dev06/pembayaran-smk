<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| PUBLIC (Belum Login)
|--------------------------------------------------------------------------
*/

// Login Manual (tanpa Breeze)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Splash Screen
Route::get('/', function () {
    return view('splash');
})->name('splash');

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD BERDASARKAN ROLE
|--------------------------------------------------------------------------
*/

// Siswa
Route::middleware(['auth', 'role:siswa'])->get('/siswa/dashboard', function () {
    return view('siswa.dashboard');
})->name('siswa.dashboard');

// Admin
Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Pemilik
Route::middleware(['auth', 'role:pemilik'])->get('/pemilik/dashboard', function () {
    return view('pemilik.dashboard');
})->name('pemilik.dashboard');


/*
|--------------------------------------------------------------------------
| CRUD SISWA & TAGIHAN (Admin only)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // CRUD Siswa
    Route::controller(SiswaController::class)->prefix('siswa')->name('siswa.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // CRUD Tagihan
    Route::controller(TagihanController::class)->prefix('tagihan')->name('tagihan.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
});
