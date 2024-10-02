<?php

namespace Nacosvel\DatabaseManager\Database\Query\Processors;

use Illuminate\Database\Query\Processors\MySqlProcessor as Processor;
use Illuminate\Contracts\Database\Query\Builder;

class MySqlProcessor extends Processor
{
    /**
     * Process an "insert get ID" query.
     *
     * @param Builder     $query
     * @param string      $sql
     * @param array       $values
     * @param string|null $sequence
     *
     * @return int
     */
    #[\Override]
    public function processInsertGetId(Builder $query, $sql, $values, $sequence = null): int
    {
        return parent::processInsertGetId($query, $sql, $values, $sequence);
    }

}
