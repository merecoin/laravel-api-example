<?php

namespace Modules\Product\Routes;

use Illuminate\Support\Facades\Route;
use Modules\Product\Controllers\ProductController;

Route::prefix('api/v1')->middleware('api')->group(function () {

    Route::apiResource('products', ProductController::class);
});
