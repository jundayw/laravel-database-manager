<?php

namespace Nacosvel\DatabaseManager;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;
use Nacosvel\Contracts\DatabaseManager\DatabaseManagerInterface;
use Nacosvel\DatabaseManager\Database\Connectors\MySqlConnection;
use Nacosvel\TransactionManagerServices\ResourceManagerServices;
use Nacosvel\TransactionManagerServices\TransactionManagerServices;

class DatabaseManagerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        if (false === $this->app->configurationIsCached()) {
            $this->registerConfig();
        }
        Connection::resolverFor('mysql', function ($connection, $database, $prefix, $config) {
            return new MySqlConnection($connection, $database, $prefix, $config);
        });
        $this->app->singleton(DatabaseManagerInterface::class, function ($app) {
            $multipleDatabaseManager = new MultipleManager($app);
            return $multipleDatabaseManager->extend($multipleDatabaseManager->getDefaultInstance(), function ($app, $config) {
                return new DatabaseManager($app['db']);
            })->extend(TransactionManagerServices::class, function ($app, $config) {
                return new TransactionManager($this->instance(), new TransactionManagerServices);
            })->extend(ResourceManagerServices::class, function ($app, $config) {
                return new TransactionManager($this->instance(), new ResourceManagerServices);
            });
        });
        $this->app->singleton(TransactionManagerServices::class, function () {
            return app(DatabaseManagerInterface::class)->instance(TransactionManagerServices::class);
        });
        $this->app->singleton(ResourceManagerServices::class, function () {
            return app(DatabaseManagerInterface::class)->instance(ResourceManagerServices::class);
        });
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/database-manager.php', 'database-manager');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/database-manager.php' => config_path('database-manager.php'),
            ], 'database-manager-config');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            DatabaseManagerInterface::class,
            TransactionManagerServices::class,
            ResourceManagerServices::class,
        ];
    }

}
