<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\GameController;
use App\Http\Controllers\Dashboard\RankCategoryController;
use App\Http\Controllers\Dashboard\RankTierController;
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

    Route::get('/rank-category', function () {
        return view('dashboard.pages.rank-category.index');
    })->name('dashboard.rank-category');
    Route::get('/rank-categories/datatables', [RankCategoryController::class, 'index']);
    Route::get('/rank-category/add', [RankCategoryController::class, 'create'])->name('dashboard.rank-category.create');
    Route::post('/rank-category', [RankCategoryController::class, 'store'])->name('dashboard.rank-category.store');
    Route::get('/rank-category/{rankCategory}', [RankCategoryController::class, 'show'])->name('dashboard.rank-category.show');
    Route::put('/rank-category/{rankCategory}', [RankCategoryController::class, 'update'])->name('dashboard.rank-category.update');
    Route::delete('/rank-category/{rankCategory}', [RankCategoryController::class, 'destroy'])->name('dashboard.rank-category.destroy');

    Route::get('/rank-tier', function () {
        return view('dashboard.pages.rank-tier.index');
    })->name('dashboard.rank-tier');
    Route::get('/rank-tiers/datatables', [RankTierController::class, 'index']);
    Route::get('/rank-tier/add', [RankTierController::class, 'create'])->name('dashboard.rank-tier.create');
    Route::post('/rank-tier', [RankTierController::class, 'store'])->name('dashboard.rank-tier.store');
    Route::get('/rank-tier/{rankTier}', [RankTierController::class, 'show'])->name('dashboard.rank-tier.show');
    Route::put('/rank-tier/{rankTier}', [RankTierController::class, 'update'])->name('dashboard.rank-tier.update');
    Route::delete('/rank-tier/{rankTier}', [RankTierController::class, 'destroy'])->name('dashboard.rank-tier.destroy');

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
