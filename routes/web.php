<?php

use App\Http\Controllers\Admin\{
    DashboardController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/home', [DashboardController::class, 'index'])->name('admin.index');

    Route::resource('/users', UserController::class);

});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
