<?php

namespace Modules\ApiAuth;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Modules\ApiAuth\Guards\ViaRequestGuard;
use Modules\Contracts\UserAuthContract;
use Modules\User\Services\UserAuthService;

class ApiAuthServiceProvider extends BaseServiceProvider
{

    public function boot(ViaRequestGuard $viaRequestGuard)
    {
        Auth::viaRequest('api-auth', function (
            Request $request
        ) use ($viaRequestGuard) {
            return $viaRequestGuard
                ->getUser($request->bearerToken());
        });

        $this->loadRoutesFrom(__DIR__ . '/Routes/Routes.php');
    }

    public function register()
    {
        $this->app->bind(UserAuthContract::class, UserAuthService::class);
    }
}
