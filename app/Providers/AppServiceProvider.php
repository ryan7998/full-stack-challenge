<?php

namespace App\Providers;

use App\Services\PostService;
use App\Services\CompanyService;
use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\PostServiceInterface;
use App\Services\Contracts\CompanyServiceInterface;
use App\Repositories\Eloquent\EloquentPostRepository;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Eloquent\EloquentCompanyRepository;
use App\Repositories\Contracts\CompanyRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind PostServiceInterface to PostService
        $this->app->bind(PostServiceInterface::class, PostService::class);

        // Bind JobRepositoryInterface to EloquentJobRepository
        $this->app->bind(PostRepositoryInterface::class, EloquentPostRepository::class);

        // Bind CompanyServiceInterface to CompanyService
        $this->app->bind(CompanyServiceInterface::class, CompanyService::class);

        // Bind Company Repository
        $this->app->bind(CompanyRepositoryInterface::class, EloquentCompanyRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
