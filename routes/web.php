<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site-user.pages.index' );
})->name('index');
Route::get('/joki-game', function () {
    return view('site-user.pages.joki-game' );
})->name('joki-game');
Route::get('/akun-game', function () {
    return view('site-user.pages.akun-game' );
})->name('akun-game');
Route::get('/transaksi', function () {
    return view('site-user.pages.transaksi' );
})->name('transaksi');

Route::get('/dashboard', function () {
    return view('dashboard.pages.index' );
})->name('dashboard');
Route::get('/dashboard/game', function () {
    return view('dashboard.pages.game.index' );
})->name('dashboard.game');
Route::get('/dashboard/game/add', function () {
    return view('dashboard.pages.game.add-game' );
})->name('dashboard.game.add');