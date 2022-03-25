<?php

use App\Http\Controllers\Admin\{
    DashboardController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/home', [DashboardController::class, 'index'])->name('admin.index');

    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');

});

Route::get('/', function () {
    return view('auth.login');
});

// Auth::routes();
