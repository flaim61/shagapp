<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;

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

Route::controller(CategoryController::class)->group(function(){
    Route::get('category', 'getCategories');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('products/{categoryId}', 'getProductsByCategoryId');
    Route::get('products', 'getProducts');
    Route::get('product/{productId}', 'getProductInfoById');
});

Route::controller(BannerController::class)->group(function(){
    Route::get('banner/{categoryId}', 'getImageByBannerId');
    Route::get('banner', 'getImageByBannerId');
});
