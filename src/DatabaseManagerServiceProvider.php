<?php

namespace Nacosvel\DatabaseManager;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;
use Nacosvel\Contracts\DatabaseManager\DatabaseManagerInterface;
use Nacosvel\DatabaseManager\Connectors\MySqlConnection;

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

        $this->app->bind(DatabaseManagerInterface::class, function ($app) {
            return new DatabaseManager($app['db']);
        });
    }

}
