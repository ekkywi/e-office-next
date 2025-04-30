<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('eof')->name('eof')->group(function () {
    Route::get('/login', [App\Http\Controllers\Main\Navigation::class, 'showLogin'])->name('login');
    Route::get('/dashboard', [App\Http\Controllers\Main\Navigation::class, 'showEofDashboard'])->name('dashboard');
    Route::get('/application', [App\Http\Controllers\Main\Navigation::class, 'showEofApplication'])->name('application');
    Route::get('setting', [App\Http\Controllers\Main\Navigation::class, 'showEofSetting'])->name('setting');
    Route::get('/help', [App\Http\Controllers\Main\Navigation::class, 'showEofHelp'])->name('help');
    Route::get('/maintenance', [App\Http\Controllers\Main\Navigation::class, 'showEofMaintenance'])->name('maintenance');

    Route::prefix('maintenance')->name('maintenance.')->group(function () {
        Route::get('/account', [App\Http\Controllers\Main\Navigation::class, 'showEofAccount'])->name('account');

        Route::prefix('organization')->name('organization.')->group(function () {
            Route::get('/', [App\Http\Controllers\Main\Navigation::class, 'showEofOrganization'])->name('organization');
            Route::get('/division', [App\Http\Controllers\Main\Navigation::class, 'showEofDivision'])->name('division');
        });
    });
});
