<?php

use Nacosvel\Contracts\DatabaseManager\DatabaseManagerInterface;
use Nacosvel\TransactionManagerServices\ResourceManagerServices;
use Nacosvel\TransactionManagerServices\TransactionManagerServices;

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
        DatabaseManagerInterface::class   => [
            'driver' => DatabaseManagerInterface::class,
        ],
        ResourceManagerServices::class    => [
            'driver' => ResourceManagerServices::class,
        ],
        TransactionManagerServices::class => [
            'driver' => TransactionManagerServices::class,
        ],
    ],

];
