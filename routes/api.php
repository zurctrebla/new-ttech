<?php

use App\Http\Controllers\Api\{
    ClientController,
    DeviceController,
    GameController,
    InventoryController,
    LocatorController,
    PartnerController,
    ProductController,
    ReadingController,
    UserController
};
use App\Http\Controllers\Api\ACL\{
    PermissionController,
    RoleController
};

use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/users', UserController::class);
Route::apiResource('/roles', RoleController::class);
Route::apiResource('/permissions', PermissionController::class);
Route::apiResource('/games', GameController::class);
Route::apiResource('/devices', DeviceController::class);
Route::apiResource('/partners', PartnerController::class);
Route::apiResource('/clients', ClientController::class);
Route::apiResource('/locators', LocatorController::class);
Route::apiResource('/inventories', InventoryController::class);
Route::apiResource('/products', ProductController::class);
Route::resource('/readings', ReadingController::class);

Route::get('/', function () {
    return response()->json(['message' => 'success']);
});
