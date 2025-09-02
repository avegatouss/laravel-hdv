<?php
use Illuminate\Support\Facades\Route;
use LaravelHdv\Http\Controllers\Admin\ModuleController;

Route::middleware(['web', 'auth', 'can:admin-modules'])
    ->prefix('admin/hdv')
    ->name('admin.hdv.')
    ->group(function () {
        Route::get('modules', [ModuleController::class, 'index'])->name('modules.index');
    });