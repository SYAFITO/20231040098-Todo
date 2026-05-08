<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CategoryApiController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTE
|--------------------------------------------------------------------------
*/

// LOGIN
Route::post('/login', [AuthController::class, 'getToken']);


/*
|--------------------------------------------------------------------------
| PROTECTED ROUTE (SANCTUM)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    // USER LOGIN
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    /*
    |--------------------------------------------------------------------------
    | PRODUCT API
    |--------------------------------------------------------------------------
    */

    Route::apiResource('product', ProductApiController::class);

    /*
    |--------------------------------------------------------------------------
    | CATEGORY API
    |--------------------------------------------------------------------------
    */

    Route::apiResource('categories', CategoryApiController::class);

});