<?php

namespace Nacosvel\DatabaseManager\Database\Query\Grammars;

use Illuminate\Database\Query\Grammars\MySqlGrammar as Grammar;

class MySqlGrammar extends Grammar
{
    /**
     * Compile the SQL statement to define a savepoint.
     *
     * @param string $name
     *
     * @return string
     */
    #[\Override]
    public function compileSavepoint($name): string
    {
        return 'SAVEPOINT ' . $name;
    }

    /**
     * Compile the SQL statement to execute a savepoint rollback.
     *
     * @param string $name
     *
     * @return string
     */
    #[\Override]
    public function compileSavepointRollBack($name): string
    {
        return 'ROLLBACK TO SAVEPOINT ' . $name;
    }

    /**
     * Compile the SQL statement to start an XA transaction.
     *
     * @param string $xid The transaction ID.
     *
     * @return string The SQL statement to start an XA transaction.
     */
    public function compileStartXa(string $xid): string
    {
        return "XA START '{$xid}'";
    }

    /**
     * Compile the SQL statement to end an XA transaction.
     *
     * @param string $xid The transaction ID.
     *
     * @return string The SQL statement to end an XA transaction.
     */
    public function compileEndXa(string $xid): string
    {
        return "XA END '{$xid}'";
    }

    /**
     * Compile the SQL statement to prepare an XA transaction.
     *
     * @param string $xid The transaction ID.
     *
     * @return string The SQL statement to prepare an XA transaction.
     */
    public function compilePrepareXa(string $xid): string
    {
        return "XA PREPARE '{$xid}'";
    }

    /**
     * Compile the SQL statement to commit an XA transaction.
     *
     * @param string $xid The transaction ID.
     *
     * @return string The SQL statement to commit an XA transaction.
     */
    public function compileCommitXa(string $xid): string
    {
        return "XA COMMIT '{$xid}'";
    }

    /**
     * Compile the SQL statement to roll back an XA transaction.
     *
     * @param string $xid The transaction ID.
     *
     * @return string The SQL statement to roll back an XA transaction.
     */
    public function compileRollbackXa(string $xid): string
    {
        return "XA ROLLBACK '{$xid}'";
    }

}
