<?php

use App\Http\Controllers\Api\{
    UserController
};
use App\Http\Controllers\Api\ACL\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/users', UserController::class);

Route::apiResource('/roles', RoleController::class);


Route::get('/', function () {
    return response()->json(['message' => 'success']);
});
