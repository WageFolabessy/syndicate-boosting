<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\BoostingServiceController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FaqController;
use App\Http\Controllers\Dashboard\GameAccountController;
use App\Http\Controllers\Dashboard\GameController;
use App\Http\Controllers\Dashboard\LabelController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\RankCategoryController;
use App\Http\Controllers\Dashboard\RankTierController;
use App\Http\Controllers\Dashboard\RankTierDetailController;
use App\Http\Controllers\Dashboard\TransactionController;
use App\Http\Controllers\SiteUser\AccountOrderController;
use App\Http\Controllers\SiteUser\BoostingServicePageController;
use App\Http\Controllers\SiteUser\CustomOrderController;
use App\Http\Controllers\SiteUser\GameAccountPageController;
use App\Http\Controllers\SiteUser\PackageOrderController;
use App\Http\Controllers\SiteUser\PageController;
use App\Http\Controllers\SiteUser\TransactionPageController;
use Illuminate\Support\Facades\Route;

// ################################################ Route Milik User ################################################
Route::get('', [PageController::class, 'index'])->name('index');

Route::post('/account-order/process', [AccountOrderController::class, 'processPayment']);
Route::post('/package-order/process', [PackageOrderController::class, 'processPayment']);
Route::post('/custom-order/process', [CustomOrderController::class, 'processPayment']);
Route::post('/midtrans/notification', [AccountOrderController::class, 'handleNotification']);

Route::get('/akun-game', [GameAccountPageController::class, 'index'])->name('akun-game');
Route::get('/akun-game/{game:slug}/{account}/detail', [GameAccountPageController::class, 'show'])->name('akun-game.detail');

Route::get('/joki-game', [BoostingServicePageController::class, 'index'])->name('joki-game');
Route::get('/joki-game/{game:slug}/pilih-layanan', [BoostingServicePageController::class, 'serviceSelection'])->name('pilih-layanan');
Route::get('/joki-game/{game:slug}/joki-paket', [BoostingServicePageController::class, 'packageBoosting'])->name('joki-paket');
Route::get('/joki-game/{game:slug}/joki-kostum', [BoostingServicePageController::class, 'customBoosting'])->name('joki-kostum');
Route::get('/joki-game/{game:slug}/joki-paket/{service}/detail', [BoostingServicePageController::class, 'show'])->name('joki-game.detail');

Route::get('/transaksi', [TransactionPageController::class, 'index'])->name('transaksi');

// ################################################ Route Milik Admin ################################################
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
    // Overview
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

    // Games Managements
    Route::get('/game', function () {
        return view('dashboard.pages.game.index');
    })->name('dashboard.game');
    Route::get('/game/export', [GameController::class, 'export'])->name('dashboard.game.export');
    Route::get('/games/datatables', [GameController::class, 'index']);
    Route::get('/game/add', [GameController::class, 'create'])->name('dashboard.game.create');
    Route::post('/game', [GameController::class, 'store'])->name('dashboard.game.store');
    Route::get('/game/{game:id}', [GameController::class, 'show'])->name('dashboard.game.show');
    Route::put('/game/{game:id}', [GameController::class, 'update'])->name('dashboard.game.update');
    Route::delete('/game/{game:id}', [GameController::class, 'destroy'])->name('dashboard.game.destroy');

    // Rank Categories Managements
    Route::get('/rank-category', function () {
        return view('dashboard.pages.rank-category.index');
    })->name('dashboard.rank-category');
    Route::get('/rank-categories/export', [RankCategoryController::class, 'export'])->name('dashboard.rank-category.export');
    Route::get('/rank-categories/datatables', [RankCategoryController::class, 'index']);
    Route::get('/rank-category/add', [RankCategoryController::class, 'create'])->name('dashboard.rank-category.create');
    Route::post('/rank-category', [RankCategoryController::class, 'store'])->name('dashboard.rank-category.store');
    Route::get('/rank-category/{rankCategory}', [RankCategoryController::class, 'show'])->name('dashboard.rank-category.show');
    Route::put('/rank-category/{rankCategory}', [RankCategoryController::class, 'update'])->name('dashboard.rank-category.update');
    Route::delete('/rank-category/{rankCategory}', [RankCategoryController::class, 'destroy'])->name('dashboard.rank-category.destroy');

    // Rank Tiers Managements
    Route::get('/rank-tier', function () {
        return view('dashboard.pages.rank-tier.index');
    })->name('dashboard.rank-tier');
    Route::get('/rank-tier/export', [RankTierController::class, 'export'])->name('dashboard.rank-tier.export');
    Route::get('/rank-tiers/datatables', [RankTierController::class, 'index']);
    Route::get('/rank-tier/add', [RankTierController::class, 'create'])->name('dashboard.rank-tier.create');
    Route::post('/rank-tier', [RankTierController::class, 'store'])->name('dashboard.rank-tier.store');
    Route::get('/rank-tier/{rankTier}', [RankTierController::class, 'show'])->name('dashboard.rank-tier.show');
    Route::put('/rank-tier/{rankTier}', [RankTierController::class, 'update'])->name('dashboard.rank-tier.update');
    Route::delete('/rank-tier/{rankTier}', [RankTierController::class, 'destroy'])->name('dashboard.rank-tier.destroy');

    // Rank Tier Details Managements
    Route::get('/rank-tier-detail', function () {
        return view('dashboard.pages.rank-tier-detail.index');
    })->name('dashboard.rank-tier-detail');
    Route::get('/rank-tier-detail/export', [RankTierDetailController::class, 'export'])->name('dashboard.rank-tier-detail.export');
    Route::get('/rank-tier-details/datatables', [RankTierDetailController::class, 'index']);
    Route::get('/rank-tier-detail/add', [RankTierDetailController::class, 'create'])->name('dashboard.rank-tier-detail.create');
    Route::post('/rank-tier-detail', [RankTierDetailController::class, 'store'])->name('dashboard.rank-tier-detail.store');
    Route::get('/rank-tier-detail/{detail}', [RankTierDetailController::class, 'show'])->name('dashboard.rank-tier-detail.show');
    Route::put('/rank-tier-detail/{detail}', [RankTierDetailController::class, 'update'])->name('dashboard.rank-tier-detail.update');
    Route::delete('/rank-tier-detail/{detail}', [RankTierDetailController::class, 'destroy'])->name('dashboard.rank-tier-detail.destroy');

    // Labels Managements
    Route::get('/label', function () {
        return view('dashboard.pages.label.index');
    })->name('dashboard.label');
    Route::get('/label/export', [LabelController::class, 'export'])->name('dashboard.label.export');
    Route::get('/labels/datatables', [LabelController::class, 'index']);
    Route::get('/label/add', [LabelController::class, 'create'])->name('dashboard.label.create');
    Route::post('/label', [LabelController::class, 'store'])->name('dashboard.label.store');
    Route::get('/label/{label}', [LabelController::class, 'show'])->name('dashboard.label.show');
    Route::put('/label/{label}', [LabelController::class, 'update'])->name('dashboard.label.update');
    Route::delete('/label/{label}', [LabelController::class, 'destroy'])->name('dashboard.label.destroy');

    // Boosting Services Managements
    Route::get('/boosting-service', function () {
        return view('dashboard.pages.boosting-service.index');
    })->name('dashboard.boosting-service');
    Route::get('/boosting-service/export', [BoostingServiceController::class, 'export'])->name('dashboard.boosting-service.export');
    Route::get('/boosting-services/datatables', [BoostingServiceController::class, 'index']);
    Route::get('/boosting-service/add', [BoostingServiceController::class, 'create'])->name('dashboard.boosting-service.create');
    Route::post('/boosting-service', [BoostingServiceController::class, 'store'])->name('dashboard.boosting-service.store');
    Route::get('/boosting-service/{service}', [BoostingServiceController::class, 'show'])->name('dashboard.boosting-service.show');
    Route::put('/boosting-service/{service}', [BoostingServiceController::class, 'update'])->name('dashboard.boosting-service.update');
    Route::delete('/boosting-service/{service}', [BoostingServiceController::class, 'destroy'])->name('dashboard.boosting-service.destroy');

    // Game Accounts Managements
    Route::get('/game-account', function () {
        return view('dashboard.pages.game-account.index');
    })->name('dashboard.game-account');
    Route::get('/game-account/export', [GameAccountController::class, 'export'])->name('dashboard.game-account.export');
    Route::get('/game-accounts/datatables', [GameAccountController::class, 'index']);
    Route::get('/game-account/add', [GameAccountController::class, 'create'])->name('dashboard.game-account.create');
    Route::post('/game-account', [GameAccountController::class, 'store'])->name('dashboard.game-account.store');
    Route::get('/game-account/{gameAccount}', [GameAccountController::class, 'show'])->name('dashboard.game-account.show');
    Route::put('/game-account/{gameAccount}', [GameAccountController::class, 'update'])->name('dashboard.game-account.update');
    Route::delete('/game-account/{gameAccount}', [GameAccountController::class, 'destroy'])->name('dashboard.game-account.destroy');

    // All Transactions Managements
    Route::get('/transactions/all', function () {
        return view('dashboard.pages.transaction.all-transaction');
    })->name('dashboard.all-transactions');
    Route::get('/transactions/all/datatables', [TransactionController::class, 'getAllTransactions']);

    // Custom Boosting Transactions Managements
    Route::get('/transactions/custom-boosting', function () {
        return view('dashboard.pages.transaction.custom-boosting-transaction');
    })->name('dashboard.custom-boosting-transaction');
    Route::get('/transactions/custom-boosting/datatables', [TransactionController::class, 'getAllcustomBoostingTransaction']);
    Route::get('/transaction/custom-boosting/{custom}', [TransactionController::class, 'showCustomBoostingOrder'])->name('dashboard.custom-boosting-transaction.detail');

    // Package Boosting Transactions Managements
    Route::get('/transactions/package-boosting', function () {
        return view('dashboard.pages.transaction.package-boosting-transaction');
    })->name('dashboard.package-boosting-transaction');
    Route::get('/transactions/package-boosting/datatables', [TransactionController::class, 'getAllpackageBoostingTransaction']);
    Route::get('/transaction/package-boosting/{package}', [TransactionController::class, 'showPackageBoostingOrder'])->name('dashboard.package-boosting-transaction.detail');

    // Account Game Transactions Managements
    Route::get('/transactions/game-account', function () {
        return view('dashboard.pages.transaction.game-account-transaction');
    })->name('dashboard.game-account-transaction');
    Route::get('/transactions/game-account/datatables', [TransactionController::class, 'getAllgameAccountTransaction']);

    // Payments Managements
    Route::get('/payment', function () {
        return view('dashboard.pages.payment.index');
    })->name('dashboard.payment');
    Route::get('/payments/datatables', [PaymentController::class, 'getAllPayments']);
    Route::get('/payment/{payment}', [PaymentController::class, 'show'])->name('dashboard.payment.show');

    // FAQ'S Managements
    Route::get('/faq', function () {
        return view('dashboard.pages.faq.index');
    })->name('dashboard.faq');
    Route::get('/faq/export', [FaqController::class, 'export'])->name('dashboard.faq.export');
    Route::get('/faqs/datatables', [FaqController::class, 'index']);
    Route::get('/faq/add', [FaqController::class, 'create'])->name('dashboard.faq.create');
    Route::post('/faq', [FaqController::class, 'store'])->name('dashboard.faq.store');
    Route::get('/faq/{faq}', [FaqController::class, 'show'])->name('dashboard.faq.show');
    Route::put('/faq/{faq}', [FaqController::class, 'update'])->name('dashboard.faq.update');
    Route::delete('/faq/{faq}', [FaqController::class, 'destroy'])->name('dashboard.faq.destroy');

    // Admin Managements
    Route::get('/admin', function () {
        return view('dashboard.pages.admin.index');
    })->name('dashboard.admin');
    Route::get('/admin/export', [AdminController::class, 'export'])->name('dashboard.admin.export');
    Route::get('/admins/datatables', [AdminController::class, 'index']);
    Route::get('/admin/add', [AdminController::class, 'create'])->name('dashboard.admin.create');
    Route::post('/admin', [AdminController::class, 'store'])->name('dashboard.admin.store');
    Route::get('/profile/{admin}', [AdminController::class, 'show'])->name('dashboard.admin.show');
    Route::put('/admin/{admin}', [AdminController::class, 'update'])->name('dashboard.admin.update');
    Route::delete('/admin/{admin}', [AdminController::class, 'destroy'])->name('dashboard.admin.destroy');
});
