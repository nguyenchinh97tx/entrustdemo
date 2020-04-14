<?php

namespace Core\Providers;

use Core\Repositories\RoleRepository;
use Core\Repositories\RoleRepositoryContract;
use Core\Repositories\UserRepository;
use Core\Repositories\UserRepositoryContract;
use Core\Services\BookService;
use Core\Repositories\BookRepository;
use Core\Services\BookServiceContract;
use Core\Services\RoleService;
use Core\Services\RoleServiceContract;
use Core\Services\UserService;
use Core\Services\UserServiceContract;
use Core\Repositories\BookRepositoryContract;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use File;

class CommonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BookRepositoryContract::class, BookRepository::class);
        $this->app->bind(BookServiceContract::class, BookService::class);
        $this->app->bind(RoleRepositoryContract::class, RoleRepository::class);
        $this->app->bind(RoleServiceContract::class, RoleService::class);
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(UserServiceContract::class, UserService::class);
    }
}
