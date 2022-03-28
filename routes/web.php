<?php

use App\Http\Controllers\Admin\{
    ClientController,
    DashboardController,
    DeviceController,
    GameController,
    InventoryController,
    LocatorController,
    OrderController,
    PartnerController,
    ProductController,
    ReadingController,
    ReportController,
    UserController
};
use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\RoleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/home', [DashboardController::class, 'index'])->name('admin.index');
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/games', GameController::class);
    Route::resource('/devices', DeviceController::class);
    Route::resource('/partners', PartnerController::class);
    Route::resource('/clients', ClientController::class);
    Route::resource('/partners', PartnerController::class);
    Route::resource('/locators', LocatorController::class);
    Route::resource('/inventories', InventoryController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/readings', ReadingController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/reports', ReportController::class);


});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
