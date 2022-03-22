<?php

namespace App\Providers;

// Загружаемые классы
use App\Services\Riak\Connection;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Routing\ResponseFactory;

// Позволит отложить загрузку
use Illuminate\Contracts\Support\DeferrableProvider;

use Illuminate\Support\ServiceProvider;

class TESTProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Connection::class, function ($app) {
            return new Connection($app['config']['riak']);
        });
    }

    /** // Позволит отложить загрузку
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Connection::class];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $response)
    {
        View::composer('view', function () {
            //
        });

        $response->macro('serialized', function ($value) {
            //
        });
    }
}
