<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Write\EmailWriteRepository;
use App\Repositories\Read\User\UserReadRepository;
use App\Repositories\Write\EmailWriteRepositoryInterface;
use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Read\PassportClient\ClientReadRepository;
use App\Repositories\Read\PassportClient\ClientReadRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UserReadRepositoryInterface::class,
            UserReadRepository::class
        );
        $this->app->bind(
            ClientReadRepositoryInterface::class,
            ClientReadRepository::class
        );
        $this->app->bind(
            EmailWriteRepositoryInterface::class,
            EmailWriteRepository::class
        );
    }
}
