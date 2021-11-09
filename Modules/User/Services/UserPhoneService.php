<?php

namespace Modules\User\Services;

use Modules\User\Models\User;

class UserPhoneService
{

    /**
     * Set phone status to Veryfied
     */
    public function setPhoneToVerified(User $user)
    {
        $user->phone = $user->unverified_phone;
        $user->verified_phone_at = now();
        $user->sms_code = null;
        $user->save();
    }
}
