<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KlaimController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SerahTerimaController;
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

Route::get('/', function () {
    return view('home');
});

Route::prefix('pages')
    ->middleware(['auth'])
    ->name('pages.')
    ->group(function () {
        Route::resources([
            'laporan' => LaporanController::class,
            'klaim' => KlaimController::class,
            'serah_terima' => SerahTerimaController::class,
        ]);
    });

// matikan route ini jika .env email sudah di seting
Route::get('/forgot-password', function () {
    return redirect()->back();
})->name('password.request')->middleware(['guest']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/change-profile-avatar', [DashboardController::class, 'changeAvatar'])->name('change-profile-avatar');
    Route::delete('/remove-profile-avatar', [DashboardController::class, 'removeAvatar'])->name('remove-profile-avatar');

    // route untuk superadmin jika diperlukan
    // Route::middleware(['can:superadmin'])->group(function () {
    //     Route::resources([
    //         'user' => UserController::class,
    //     ]);
    // });

    // route untuk admin dan user
     Route::middleware(['role:admin,user'])->group(function () {
        Route::resource('laporan', LaporanController::class);
    });

    // route untuk admin
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('user', UserController::class);
    });

    // Serah Terima - accessible for both admin and user
    Route::middleware(['role:admin,user'])->group(function () {
        Route::get('/serah-terima', [SerahTerimaController::class, 'index'])->name('serah-terima.index');
        Route::get('/serah-terima/create', [SerahTerimaController::class, 'create'])->name('serah-terima.create');
        Route::get('/serah-terima/create/{klaim}', [SerahTerimaController::class, 'createWithKlaim'])->name('serah-terima.create.with-klaim');
        Route::post('/serah-terima/{klaim}', [SerahTerimaController::class, 'store'])->name('serah-terima.store');
        Route::get('/jadwal-saya', [SerahTerimaController::class, 'mySchedule'])->name('serah-terima.my-schedule');
    });

    // Additional klaim routes for store method and status update
    Route::get('/klaim', [KlaimController::class, 'index'])->name('klaim.index');
    Route::post('/klaim', [KlaimController::class, 'store'])->name('klaim.store');
    Route::patch('/klaim/{klaim}/status', [KlaimController::class, 'updateStatus'])->name('klaim.update-status');
});
