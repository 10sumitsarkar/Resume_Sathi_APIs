<?php

namespace Modules\Api\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ApiServiceProvider extends ServiceProvider
{
    protected $moduleName = 'Api';
    protected $moduleNameLower = 'api';

    public function boot()
    {
        $this->registerRoutes();
    }

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    protected function registerRoutes()
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(module_path($this->moduleName, '/Routes/api.php'));
    }
} 