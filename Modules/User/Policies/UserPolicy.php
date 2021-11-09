<?php

namespace Modules\User\Policies;

use Modules\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function owner(User $currentUser, User $targetUser)
    {
        return $currentUser->id === $targetUser->id;
    }
}
