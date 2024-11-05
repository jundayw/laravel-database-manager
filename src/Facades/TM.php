<?php

namespace Nacosvel\DatabaseManager\Facades;

use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\Facade;
use Nacosvel\TransactionManagerServices\TransactionManagerServices;

/**
 * @method static mixed connection(string $name = null) Get a database connection instance.
 * @method static mixed usingConnection(string $name, callable $callback) Set the default database connection for the callback execution.
 *
 * @method static null|string getName() Get the database connection name.
 * @method static mixed getConnectionConfiguration(string $option = null, mixed $default = null) Get the configuration for a connection.
 * @method static PDO getPdo() Get the current PDO connection.
 * @method static void unprepared(string $query) Run a raw, unprepared query against the PDO connection.
 * @method static void beginTransaction() Start a new database transaction.
 * @method static void commit() Commit the active database transaction.
 * @method static void rollBack() Rollback the active database transaction.
 * @method static void xaBeginTransaction(string $xid) Starts a distributed XA transaction with the given XID.
 * @method static void xaPrepare(string $xid) Prepares the distributed XA transaction with the given XID for commit.
 * @method static void xaCommit(string $xid) Commits the distributed XA transaction with the given XID.
 * @method static void xaRollBack(string $xid) Rolls back the distributed XA transaction with the given XID.
 * @method static void xaRecover(string $xid) Recovers the distributed XA transaction with the given XID.
 *
 * @method static void middlewareBeginTransaction()
 * @method static void middlewareRollback()
 *
 * @see DatabaseManager
 * @see \Nacosvel\DatabaseManager\DatabaseManager
 * @see TransactionManager
 * @see TransactionManagerServices
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
        return TransactionManagerServices::class;
    }

}
