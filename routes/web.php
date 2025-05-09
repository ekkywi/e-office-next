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

    Route::prefix('maintenance')->name('maintenance.')->group(function () {
        Route::get('/', [App\Http\Controllers\Main\Navigation::class, 'showEofMaintenance'])->name('maintenance');

        Route::prefix('account')->name('account.')->group(function () {
            Route::get('/', [App\Http\Controllers\Main\Navigation::class, 'showEofAccount'])->name('account');
            Route::get('/user', [App\Http\Controllers\Main\Navigation::class, 'showEofUser'])->name('user');
            Route::get('/role', [App\Http\Controllers\Main\Navigation::class, 'showEofRole'])->name('role');
            Route::get('/permission', [App\Http\Controllers\Main\Navigation::class, 'showEofPermission'])->name('permission');
        });

        Route::prefix('organization')->name('organization.')->group(function () {
            Route::get('/', [App\Http\Controllers\Main\Navigation::class, 'showEofOrganization'])->name('organization');
            Route::get('/division', [App\Http\Controllers\Main\Navigation::class, 'showEofDivision'])->name('division');
            Route::get('/section', [App\Http\Controllers\Main\Navigation::class, 'showEofSection'])->name('section');
            Route::get('/position', [App\Http\Controllers\Main\Navigation::class, 'showEofPosition'])->name('position');
        });
    });
});
