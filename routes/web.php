<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\NavigationController;
use App\Http\Controllers\Organization\DivisionController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('eof')->name('eof')->group(function () {
    Route::get('/login', [NavigationController::class, 'showLogin'])->name('login');
    Route::get('/dashboard', [NavigationController::class, 'showEofDashboard'])->name('dashboard');
    Route::get('/application', [NavigationController::class, 'showEofApplication'])->name('application');
    Route::get('setting', [NavigationController::class, 'showEofSetting'])->name('setting');
    Route::get('/help', [NavigationController::class, 'showEofHelp'])->name('help');

    Route::prefix('maintenance')->name('maintenance.')->group(function () {
        Route::get('/', [NavigationController::class, 'showEofMaintenance'])->name('maintenance');

        Route::prefix('account')->name('account.')->group(function () {
            Route::get('/', [NavigationController::class, 'showEofAccount'])->name('account');
            Route::get('/user', [NavigationController::class, 'showEofUser'])->name('user');
            Route::get('/role', [NavigationController::class, 'showEofRole'])->name('role');
            Route::get('/permission', [NavigationController::class, 'showEofPermission'])->name('permission');
        });

        Route::prefix('organization')->name('organization.')->group(function () {
            Route::get('/', [NavigationController::class, 'showEofOrganization'])->name('organization');

            Route::prefix('division')->name('division.')->group(function () {
                Route::get('/', [DivisionController::class, 'showEofDivision'])->name('division');
                Route::post('/division/store', [DivisionController::class, 'store'])->name('store');
                Route::post('/division/update/{id}', [DivisionController::class, 'update'])->name('update');
            });

            Route::get('/section', [NavigationController::class, 'showEofSection'])->name('section');
            Route::get('/position', [NavigationController::class, 'showEofPosition'])->name('position');
        });
    });
});
