<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'ensure.hdv'])
    ->prefix('hdv')
    ->name('hdv.')
    ->group(function () {
        Route::get('ping', fn () => response()->json(['ok' => true, 'module' => 'hdv']))->name('ping');
    });