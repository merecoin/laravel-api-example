<?php

namespace Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\Models\User;
use Modules\User\Resources\UserResource;
use Modules\User\Requests\UpdateUserRequest;
use Modules\User\Requests\PhoneVerifyRequest;
use Modules\User\Services\UserPhoneService;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    /**
     * Отображает одного юзера.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update (patch) User.
     */
    public function update(UpdateUserRequest $request, User $user)
    {   
        $validated = $request->validated();
        $user->update($validated);
        $user->profile()->update(
            Arr::only(
                $validated,
                ['name', 'subscribed']
            )
        );
        return new UserResource($user->load('profile'));
    }

    /**
     * Подтверждает телефон пользователя.
     */
    public function phoneVerify(
        UserPhoneService $service,
        PhoneVerifyRequest $request,
        User $user,
        int $phone
    ) {

        if (
            $user->unverified_phone == $phone
            && $request->validated()['smsCode'] == $user->sms_code
        ) {
            $service->setPhoneToVerified($user);
        }
        return new UserResource($user);
    }
}
