<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site-user.pages.index');
})->name('index');
Route::get('/joki-game', function () {
    return view('site-user.pages.joki-game');
})->name('joki-game');
Route::get('/akun-game', function () {
    return view('site-user.pages.akun-game');
})->name('akun-game');
Route::get('/transaksi', function () {
    return view('site-user.pages.transaksi');
})->name('transaksi');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot.password');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard.pages.index');
    })->name('dashboard')->middleware('auth');

    Route::get('/game', function () {
        return view('dashboard.pages.game.index');
    })->name('dashboard.game');
    Route::get('/games/datatables', [GameController::class, 'index']);
    Route::get('/game/add', [GameController::class, 'create'])->name('dashboard.game.create');
    Route::post('/game', [GameController::class, 'store'])->name('dashboard.game.store');
    Route::get('/game/{game}', [GameController::class, 'show'])->name('dashboard.game.show');
    Route::put('/game/{game}', [GameController::class, 'update'])->name('dashboard.game.update');
    Route::delete('/game/{game}', [GameController::class, 'destroy'])->name('dashboard.game.destroy');

    Route::get('/admin', function () {
        return view('dashboard.pages.admin.index');
    })->name('dashboard.admin');
    Route::get('/admins/datatables', [AdminController::class, 'index']);
    Route::get('/admin/add', [AdminController::class, 'create'])->name('dashboard.admin.create');
    Route::post('/admin', [AdminController::class, 'store'])->name('dashboard.admin.store');
    Route::get('/profile/{admin}', [AdminController::class, 'show'])->name('dashboard.admin.show');
    Route::put('/admin/{admin}', [AdminController::class, 'update'])->name('dashboard.admin.update');
    Route::delete('/admin/{admin}', [AdminController::class, 'destroy'])->name('dashboard.admin.destroy');
});
