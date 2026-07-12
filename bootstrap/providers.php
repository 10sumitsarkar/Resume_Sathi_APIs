<?php

use App\Providers\AppServiceProvider;

return [
    AppServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    Modules\Api\Providers\ApiServiceProvider::class,
];
