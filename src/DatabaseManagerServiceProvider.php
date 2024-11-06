<?php

namespace Nacosvel\DatabaseManager;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;
use Nacosvel\Contracts\DatabaseManager\DatabaseManagerInterface;
use Nacosvel\DatabaseManager\Database\Connectors\MySqlConnection;
use Nacosvel\DataSourceManager\DatabaseManager;
use Nacosvel\DataSourceManager\TransactionManager;
use Nacosvel\TransactionManager\ResourceManager as RM;
use Nacosvel\TransactionManager\TransactionManager as TM;

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
            })->extend(TM::class, function ($app, $config) {
                return new TransactionManager($this->instance(), new TM);
            })->extend(RM::class, function ($app, $config) {
                return new TransactionManager($this->instance(), new RM);
            });
        });
        $this->app->singleton(TM::class, function () {
            return app(DatabaseManagerInterface::class)->instance(TM::class);
        });
        $this->app->singleton(RM::class, function () {
            return app(DatabaseManagerInterface::class)->instance(RM::class);
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
            TM::class,
            RM::class,
        ];
    }

}
