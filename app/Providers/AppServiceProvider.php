<?php

namespace App\Providers;
use App\Mixins\ResponseFactoryMixin;
use Illuminate\Routing\ResponseFactory;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        ResponseFactory::mixin(new ResponseFactoryMixin());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
