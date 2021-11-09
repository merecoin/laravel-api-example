<?php

namespace Modules\User\Routes;

use Illuminate\Support\Facades\Route;
use Modules\User\Controllers\UserController;

Route::prefix('api/v1')->middleware(['api', 'auth:api-auth', 'can:owner,user'])->group(function () {

    Route::post(
        '/users/{user}/phones/{phone}/sms-code',
        [UserController::class, 'phoneVerify']
    )->name('users.phone.verify');

    Route::get('/users/{user}', [UserController::class, 'show'])
        ->name('users.show');

    Route::patch('/users/{user}', [UserController::class, 'update'])
        ->name('users.update');
});
