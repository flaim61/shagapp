<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('order-statuses', 'OrderStatusesCrudController');
    Route::crud('post', 'PostCrudController');
    Route::crud('review', 'ReviewCrudController');
    Route::crud('contact-link', 'ContactLinkCrudController');
    Route::crud('contact-link-types', 'ContactLinkTypesCrudController');
}); // this should be the absolute last line of this file