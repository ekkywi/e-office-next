<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/eof-dashboard', [App\Http\Controllers\Main\Navigation::class, 'showEofDashboard'])->name('eof-dashboard');
Route::get('/eof-application', [App\Http\Controllers\Main\Navigation::class, 'showEofApplication'])->name('eof-application');
