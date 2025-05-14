<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\NavigationController;
use App\Http\Controllers\Organization\DivisionController;
use App\Http\Controllers\Organization\SectionController;
use App\Http\Controllers\Organization\PositionController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('eof')->name('eof.')->group(function () {
    Route::get('dashboard', [NavigationController::class, 'showEofDashboard'])->name('dashboard');
    Route::get('application', [NavigationController::class, 'showEofApplication'])->name('application');
    Route::get('setting', [NavigationController::class, 'showEofSetting'])->name('setting');
    Route::get('help', [NavigationController::class, 'showEofHelp'])->name('help');
    Route::get('maintenance', [NavigationController::class, 'showEofMaintenance'])->name('maintenance');
    Route::get('account', [NavigationController::class, 'showEofAccount'])->name('account');
    Route::get('organization', [NavigationController::class, 'showEofOrganization'])->name('organization');

    Route::prefix('division')->name('division.')->group(function () {
        Route::get('/', [DivisionController::class, 'showEofDivision'])->name('division');
        Route::post('/', [DivisionController::class, 'store'])->name('store');
        Route::put('/', [DivisionController::class, 'update'])->name('update');
        Route::delete('/', [DivisionController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('section')->name('section.')->group(function () {
        Route::get('/', [SectionController::class, 'showEofSection'])->name('section');
        Route::post('/', [SectionController::class, 'store'])->name('store');
        Route::put('/', [SectionController::class, 'update'])->name('update');
        Route::delete('/', [SectionController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('position')->name('position.')->group(function () {
        Route::get('/', [PositionController::class, 'showEofPosition'])->name('position');
        Route::post('/', [PositionController::class, 'store'])->name('store');
        Route::put('/', [PositionController::class, 'update'])->name('update');
        Route::delete('/', [PositionController::class, 'destroy'])->name('destroy');
    });
});
