<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TransferRepository;
use App\Interfaces\TransferRepositoryInterface;
use App\Repositories\UserRepository;
use App\Interfaces\UserRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TransferRepositoryInterface::class, TransferRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
