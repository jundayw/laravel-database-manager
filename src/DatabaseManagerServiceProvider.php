<?php

namespace Nacosvel\DatabaseManager;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;
use Nacosvel\Contracts\DatabaseManager\DatabaseManagerInterface;
use Nacosvel\Contracts\DatabaseManager\TransactionCoordinatorInterface;
use Nacosvel\Contracts\DatabaseManager\TransactionManagerInterface;
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
        $this->app->bind(DatabaseManagerInterface::class, function () {
            return new DatabaseManager($this->app['db']);
        });
        $this->app->singleton(TransactionCoordinatorInterface::class, TransactionCoordinator::class);
        $this->app->singleton(TransactionManagerInterface::class, TransactionManager::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
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
