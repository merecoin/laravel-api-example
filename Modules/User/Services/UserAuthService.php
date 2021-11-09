<?php

namespace Modules\User\Services;

use Modules\User\Models\User;
use Modules\Contracts\UserAuthContract;

class UserAuthService implements UserAuthContract
{

    /**
     * Создаем нового юзера с токеном, профайлом и корзиной
     */
    public function createUser(string $bearerToken): User
    {
        $user = User::create(['plain_bearer_token' => $bearerToken]);
        $user->profile()->create();
        $user->cart()->create();
        return $user;
    }
}
