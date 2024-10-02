<?php

namespace Nacosvel\DatabaseManager\Database\Concerns;

trait ResourceManagerXA
{
    /**
     * Starts a distributed XA transaction with the given XID.
     *
     * @param string $xid The global transaction identifier (XID).
     *
     * @return void
     */
    public function startTransactionXa(string $xid): void
    {
        $this->getPdo()->exec(
            $this->getDefaultQueryGrammar()->compileStartXa($xid)
        );
    }

    /**
     * Ends the distributed XA transaction with the given XID.
     *
     * @param string $xid The global transaction identifier (XID).
     *
     * @return void
     */
    public function endTransactionXa(string $xid): void
    {
        $this->getPdo()->exec(
            $this->getDefaultQueryGrammar()->compileEndXa($xid)
        );
    }

    /**
     * Prepares the distributed XA transaction with the given XID for commit.
     *
     * @param string $xid The global transaction identifier (XID).
     *
     * @return void
     */
    public function prepareXa(string $xid): void
    {
        $this->getPdo()->exec(
            $this->getDefaultQueryGrammar()->compilePrepareXa($xid)
        );
    }

    /**
     * Commits the distributed XA transaction with the given XID.
     *
     * @param string $xid The global transaction identifier (XID).
     *
     * @return void
     */
    public function commitXa(string $xid): void
    {
        $this->getPdo()->exec(
            $this->getDefaultQueryGrammar()->compileCommitXa($xid)
        );
    }

    /**
     * Rolls back the distributed XA transaction with the given XID.
     *
     * @param string $xid The global transaction identifier (XID).
     *
     * @return void
     */
    public function rollbackXa(string $xid): void
    {
        $this->getPdo()->exec(
            $this->getDefaultQueryGrammar()->compileRollbackXa($xid)
        );
    }

}
