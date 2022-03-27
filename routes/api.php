<?php

use App\Http\Controllers\Api\{
    DeviceController,
    GameController,
    PartnerController,
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



Route::get('/', function () {
    return response()->json(['message' => 'success']);
});
