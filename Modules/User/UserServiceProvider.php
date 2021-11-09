<?php

namespace Modules\User;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Gate;

class UserServiceProvider extends BaseServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::policy(
            'Modules\User\Models\User',
            'Modules\User\Policies\UserPolicy'
        );

        $this->loadRoutesFrom(__DIR__ . '/Routes/Routes.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
