<?php

namespace Nacosvel\DatabaseManager\Facades;

use Illuminate\Support\Facades\Facade;
use Nacosvel\Contracts\DatabaseManager\TransactionCoordinatorInterface;

/**
 * @method static void commit(string $transactId, array $transactRollback)
 * @method static void rollback(string $transactId, array $transactRollback)
 *
 * @see TransactionCoordinator
 */
class TC extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return TransactionCoordinatorInterface::class;
    }

}
