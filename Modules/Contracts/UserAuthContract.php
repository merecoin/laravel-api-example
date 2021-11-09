<?php

namespace Modules\Contracts;

use Modules\User\Models\User;

interface UserAuthContract
{
    public function createUser(string $bearerToken): User;
}