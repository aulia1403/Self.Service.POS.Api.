<?php

use App\Http\Controller\authController;
use App\Http\Controllers\productController;
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

Route::get('/',function(){
    return response()->json([
        'status' => false,
        'message' => 'akses tidak diperbarui'
    ], 401);
})->name('login');

Route::get('product',[productController::class, 'index'])->middleware('auth:sanctum', 'ablity:product-list');
Route::post('product',[productController::class, 'store'])->middleware('auth:sanctum', 'ability:product-store');
Route::post('registerUser',[authController::class, 'registerUser']);
Route::post('loginUser',[authController::class, 'loginUser']);