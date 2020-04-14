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

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Schema::defaultStringLength(191);

        // FORCE SSL
        if(config('app.env') != 'local') {
            URL::forceScheme('https');
        }

        // CORE
        $modulesDIR = dirname(__DIR__) . '/Modules';
        $modules = array_map('basename', File::directories($modulesDIR));
        foreach ($modules as $module) {
            // MODULES ROUTES
            if (file_exists($modulesDIR  . '/' . $module . '/routes.php')) {
                include $modulesDIR . '/' . $module . '/routes.php';
            }

            if (is_dir($modulesDIR . '/' . $module . '/Views')) {
                $this->loadViewsFrom($modulesDIR . '/' . $module . '/Views', $module);
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        $this->app->register(CommonServiceProvider::class);

    }
}
