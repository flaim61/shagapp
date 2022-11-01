<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;

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

Route::controller(CategoryController::class)->group(function(){
    Route::get('category', 'getCategories');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('products/{categoryId}', 'getProductsByCategoryId');
    Route::get('products', 'getProducts');
    Route::get('product/{productId}', 'getProductInfoById');
    Route::post('products/get-products-info', 'getProductInfoByArrayIds');
});

Route::controller(BannerController::class)->group(function(){
    Route::get('banner/{bannerId}', 'getImageByBannerId');
    Route::get('banner', 'getImageByBannerId');
});

Route::controller(UserController::class)->group(function(){
    Route::post('register', 'registerUser');
    Route::post('user-check', 'userCheck');
    Route::post('login', 'login');
    Route::post('resert-password', 'resertPassword');
    Route::post('get-info', 'getUserInfo');
});
