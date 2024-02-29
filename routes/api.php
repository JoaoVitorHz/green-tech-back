<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProductController;
use  App\Http\Controllers\SupplierController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('createProduct', [ProductController::class, 'Create']);
Route::get('getAllProduct', [ProductController::class, 'ReadAll']);
Route::post('getProduct', [ProductController::class, 'Read']);
Route::put('updateProduct', [ProductController::class, 'Update']);
Route::delete('deleteProduct', [ProductController::class, 'Delete']);


Route::post('createSupplier', [SupplierController::class, 'Create']);
Route::get('getAllSupplier', [SupplierController::class, 'ReadAll']);
Route::post('getSupplier', [SupplierController::class, 'Read']);
Route::put('updateSupplier', [SupplierController::class, 'Update']);
Route::delete('deleteSupplier', [SupplierController::class, 'Delete']);