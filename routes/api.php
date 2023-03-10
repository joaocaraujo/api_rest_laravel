<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('stores', \App\Http\Controllers\Api\StoreController::class);
Route::apiResource('stores.products', \App\Http\Controllers\Api\ProductController::class);
Route::apiResource('stores.products', \App\Http\Controllers\Api\ProductController::class)->except(['index']);
Route::post('stores/{store}/products', [\App\Http\Controllers\Api\ProductController::class, 'store']);
Route::get('stores/{store}/products/{id}', [\App\Http\Controllers\Api\ProductController::class, 'show']);
Route::put('stores/{store}/products/{id}', [\App\Http\Controllers\Api\ProductController::class, 'update']);
Route::delete('stores/{store}/products/{id}', [\App\Http\Controllers\Api\ProductController::class, 'destroy']);

