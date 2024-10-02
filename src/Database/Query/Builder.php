<?php

namespace Nacosvel\DatabaseManager\Database\Query;

class Builder extends \Illuminate\Database\Query\Builder
{
    /**
     * A flag to enable or disable SQL detection when committing the transaction.
     *
     * @var bool
     */
    protected bool $checkResult = false;

    /**
     * Set the flag for SQL detection during transaction commit.
     *
     * @param bool $checkResult
     *
     * @return static
     */
    public function setCheckResult(bool $checkResult): static
    {
        $this->checkResult = $checkResult;
        return $this;
    }

    /**
     * Get the current status of the SQL detection flag for transaction commit.
     *
     * @return bool
     */
    public function getCheckResult(): bool
    {
        return $this->checkResult;
    }

}
