<?php

namespace Modules\Product;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ProductServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
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
