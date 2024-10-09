<?php

namespace Nacosvel\DatabaseManager;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;
use Nacosvel\DatabaseManager\Database\Connectors\MySqlConnection;

class DatabaseManagerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        Connection::resolverFor('mysql', function ($connection, $database, $prefix, $config) {
            return new MySqlConnection($connection, $database, $prefix, $config);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [];
    }

}
