<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/eof-dashboard', [App\Http\Controllers\Main\Navigation::class, 'showEofDashboard'])->name('eof-dashboard');
Route::get('/eof-application', [App\Http\Controllers\Main\Navigation::class, 'showEofApplication'])->name('eof-application');
Route::get('/eof-setting', [App\Http\Controllers\Main\Navigation::class, 'showEofSetting'])->name('eof-setting');
Route::get('/eof-help', [App\Http\Controllers\Main\Navigation::class, 'showEofHelp'])->name('eof-help');
