<?php

namespace Nacosvel\DatabaseManager\Facades;

use Illuminate\Support\Facades\Facade;
use Nacosvel\Contracts\DatabaseManager\TransactionManagerInterface;
use Nacosvel\DatabaseManager\TransactionManager;

/**
 * @method static string beginTransaction()
 * @method static bool commit()
 * @method static bool rollBack()
 * @method static void middlewareBeginTransaction()
 * @method static void middlewareRollback()
 *
 * @see TransactionManager
 *
 */
class TM extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return TransactionManagerInterface::class;
    }

}
