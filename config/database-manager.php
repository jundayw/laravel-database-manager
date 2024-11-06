<?php

use Nacosvel\Contracts\DatabaseManager\DatabaseManagerInterface;
use Nacosvel\TransactionManager\ResourceManager;
use Nacosvel\TransactionManager\TransactionManager;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Manager Driver
    |--------------------------------------------------------------------------
    |
    */

    'default' => env('DATABASE_MANAGER_DRIVER', DatabaseManagerInterface::class),

    /*
    |--------------------------------------------------------------------------
    | Database Manager Drivers
    |--------------------------------------------------------------------------
    |
    */

    'drivers' => [
        DatabaseManagerInterface::class => [
            'driver' => DatabaseManagerInterface::class,
        ],
        ResourceManager::class          => [
            'driver' => ResourceManager::class,
        ],
        TransactionManager::class       => [
            'driver' => TransactionManager::class,
        ],
    ],

];
