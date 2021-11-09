<?php

namespace Modules\ApiAuth\Guards;

use Modules\User\Models\User;
use Modules\Contracts\UserAuthContract;
use Modules\Helpers\TokenHelper;

class ViaRequestGuard
{

    public function __construct(
        UserAuthContract $userAuthContract
    ) {
        $this->userAuthContract = $userAuthContract;
    }

    /**
     * Отдаем юзера по токену или создаем нового
     */
    public function getUser(?string $bearerToken): User
    {
        if ((!$bearerToken)
            || (!$user = User::where('plain_bearer_token', $bearerToken)
                ->first())
        ) {
            $user = $this->userAuthContract
                ->createUser(TokenHelper::generatePlainToken());
        }
        return $user;
    }
}
