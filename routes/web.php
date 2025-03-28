<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\BoostingServiceController;
use App\Http\Controllers\Dashboard\FaqController;
use App\Http\Controllers\Dashboard\GameAccountController;
use App\Http\Controllers\Dashboard\GameController;
use App\Http\Controllers\Dashboard\LabelController;
use App\Http\Controllers\Dashboard\RankCategoryController;
use App\Http\Controllers\Dashboard\RankTierController;
use App\Http\Controllers\SiteUser\BoostingServicePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site-user.pages.index');
})->name('index');
Route::get('/joki-game', [BoostingServicePageController::class, 'index'])->name('joki-game');
Route::get('/joki-game/{service}', [BoostingServicePageController::class, 'show'])->name('joki-game.detail');
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

    Route::get('/boosting-service', function () {
        return view('dashboard.pages.boosting-service.index');
    })->name('dashboard.boosting-service');
    Route::get('/boosting-services/datatables', [BoostingServiceController::class, 'index']);
    Route::get('/boosting-service/add', [BoostingServiceController::class, 'create'])->name('dashboard.boosting-service.create');
    Route::post('/boosting-service', [BoostingServiceController::class, 'store'])->name('dashboard.boosting-service.store');
    Route::get('/boosting-service/{service}', [BoostingServiceController::class, 'show'])->name('dashboard.boosting-service.show');
    Route::put('/boosting-service/{service}', [BoostingServiceController::class, 'update'])->name('dashboard.boosting-service.update');
    Route::delete('/boosting-service/{service}', [BoostingServiceController::class, 'destroy'])->name('dashboard.boosting-service.destroy');

    Route::get('/game-account', function () {
        return view('dashboard.pages.game-account.index');
    })->name('dashboard.game-account');
    Route::get('/game-accounts/datatables', [GameAccountController::class, 'index']);
    Route::get('/game-account/add', [GameAccountController::class, 'create'])->name('dashboard.game-account.create');
    Route::post('/game-account', [GameAccountController::class, 'store'])->name('dashboard.game-account.store');
    Route::get('/game-account/{gameAccount}', [GameAccountController::class, 'show'])->name('dashboard.game-account.show');
    Route::put('/game-account/{gameAccount}', [GameAccountController::class, 'update'])->name('dashboard.game-account.update');
    Route::delete('/game-account/{gameAccount}', [GameAccountController::class, 'destroy'])->name('dashboard.game-account.destroy');
    
    Route::get('/label', function () {
        return view('dashboard.pages.label.index');
    })->name('dashboard.label');
    Route::get('/labels/datatables', [LabelController::class, 'index']);
    Route::get('/label/add', [LabelController::class, 'create'])->name('dashboard.label.create');
    Route::post('/label', [LabelController::class, 'store'])->name('dashboard.label.store');
    Route::get('/label/{label}', [LabelController::class, 'show'])->name('dashboard.label.show');
    Route::put('/label/{label}', [LabelController::class, 'update'])->name('dashboard.label.update');
    Route::delete('/label/{label}', [LabelController::class, 'destroy'])->name('dashboard.label.destroy');

    Route::get('/faq', function () {
        return view('dashboard.pages.faq.index');
    })->name('dashboard.faq');
    Route::get('/faqs/datatables', [FaqController::class, 'index']);
    Route::get('/faq/add', [FaqController::class, 'create'])->name('dashboard.faq.create');
    Route::post('/faq', [FaqController::class, 'store'])->name('dashboard.faq.store');
    Route::get('/faq/{faq}', [FaqController::class, 'show'])->name('dashboard.faq.show');
    Route::put('/faq/{faq}', [FaqController::class, 'update'])->name('dashboard.faq.update');
    Route::delete('/faq/{faq}', [FaqController::class, 'destroy'])->name('dashboard.faq.destroy');

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
