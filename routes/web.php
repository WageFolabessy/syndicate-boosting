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
