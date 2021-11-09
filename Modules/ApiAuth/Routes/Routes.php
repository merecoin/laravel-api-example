<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Modules\User\Models\User;

Route::prefix('api/v1')->middleware('auth:api-auth')->group(function () {
    /**
     * Для наглядной демонстрации того, как работает аутентификация
     */
    Route::post('/auth/test', function () {
        $user = User::find(Auth::id());
        return $user;
    });
});
