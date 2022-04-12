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
use App\Http\Controllers\Admin\ACL\{
    PermissionController,
    PermissionRoleController,
    RoleController

};

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/home', [DashboardController::class, 'index'])->name('admin.index');
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);

    /**
     * Permission x Role
     */
    Route::get('/roles/{id}/permission/{idPermission}/detach', [PermissionRoleController::class, 'detachPermissionRole'])->name('roles.permission.detach');   /**ok */
    Route::post('/roles/{id}/permissions', [PermissionRoleController::class, 'attachPermissionsRole'])->name('roles.permissions.attach');                      /**ok */
    Route::any('/roles/{id}/permissions/create', [PermissionRoleController::class, 'permissionsAvailable'])->name('roles.permissions.available');

    Route::get('/admin/roles/{id}/permissions', [PermissionRoleController::class, 'permissions'])->name('roles.permissions');                                 /** ok */

    Route::resource('/games', GameController::class);
    Route::resource('/devices', DeviceController::class);
    Route::resource('/partners', PartnerController::class);
    Route::resource('/clients', ClientController::class);
    Route::resource('/partners', PartnerController::class);
    Route::resource('/locators', LocatorController::class);
    Route::resource('/inventories', InventoryController::class);
    /**
     *
     */
    // Route::resource('/products', ProductController::class);
    /**
     *
     */

    Route::get('/products/test', [ProductController::class, 'test'])->name('products.test');
    /**
     *
     */
    Route::get('/products/opssa', [ProductController::class, 'opssa'])->name('products.opssa');
    Route::get('/products/maintenance', [ProductController::class, 'maintenance'])->name('products.maintenance');
    Route::get('/products/report', [ProductController::class, 'report'])->name('products.report');
    Route::resource('/products', ProductController::class);
    // Route::post('/products/store', [ProductController::class, 'store']);
    /**
     *
     */
    Route::resource('/readings', ReadingController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/reports', ReportController::class);


});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
