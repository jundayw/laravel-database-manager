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
    public function xaBeginTransaction(string $xid): void
    {
        $this->getPdo()->exec(
            $this->getDefaultQueryGrammar()->compileXaStart($xid)
        );
    }

    /**
     * Ends the distributed XA transaction with the given XID.
     *
     * @param string $xid The global transaction identifier (XID).
     *
     * @return void
     */
    public function xaEndTransaction(string $xid): void
    {
        $this->getPdo()->exec(
            $this->getDefaultQueryGrammar()->compileXaEnd($xid)
        );
    }

    /**
     * Prepares the distributed XA transaction with the given XID for commit.
     *
     * @param string $xid The global transaction identifier (XID).
     *
     * @return void
     */
    public function xaPrepare(string $xid): void
    {
        $this->getPdo()->exec(
            $this->getDefaultQueryGrammar()->compileXaPrepare($xid)
        );
    }

    /**
     * Commits the distributed XA transaction with the given XID.
     *
     * @param string $xid The global transaction identifier (XID).
     *
     * @return void
     */
    public function xaCommit(string $xid): void
    {
        $this->getPdo()->exec(
            $this->getDefaultQueryGrammar()->compileXaCommit($xid)
        );
    }

    /**
     * Rolls back the distributed XA transaction with the given XID.
     *
     * @param string $xid The global transaction identifier (XID).
     *
     * @return void
     */
    public function xaRollBack(string $xid): void
    {
        $this->getPdo()->exec(
            $this->getDefaultQueryGrammar()->compileXaRollback($xid)
        );
    }

}
