<?php

namespace Nacosvel\DatabaseManager\Database\Connectors;

use Illuminate\Database\MySqlConnection as Connection;
use Nacosvel\DatabaseManager\Database\Concerns\ResourceManagerXA;
use Nacosvel\DatabaseManager\Database\Query\Builder;
use Nacosvel\DatabaseManager\Database\Query\Grammars\MySqlGrammar;
use Nacosvel\DatabaseManager\Database\Query\Processors\MySqlProcessor;

class MySqlConnection extends Connection
{
    use ResourceManagerXA;

    /**
     * Get the default query grammar instance.
     *
     * @return MySqlGrammar
     */
    #[\Override]
    protected function getDefaultQueryGrammar(): MySqlGrammar
    {
        return $this->withTablePrefix(new MySqlGrammar);
    }

    /**
     * Get the default post processor instance.
     *
     * @return MySqlProcessor
     */
    #[\Override]
    protected function getDefaultPostProcessor(): MySqlProcessor
    {
        return new MySqlProcessor;
    }

    /**
     * Get a new query builder instance.
     *
     * @return Builder
     */
    #[\Override]
    public function query(): Builder
    {
        return new Builder(
            $this, $this->getQueryGrammar(), $this->getPostProcessor()
        );
    }

    /**
     * Run an SQL statement and get the number of rows affected.
     *
     * @param string $query
     * @param array  $bindings
     *
     * @return int
     */
    #[\Override]
    public function affectingStatement($query, $bindings = []): int
    {
        return parent::affectingStatement($query, $bindings);
    }

    /**
     * Execute an SQL statement and return the boolean result.
     *
     * @param string $query
     * @param array  $bindings
     *
     * @return bool
     */
    #[\Override]
    public function statement($query, $bindings = []): bool
    {
        return parent::statement($query, $bindings);
    }

    /**
     * Get an option from the configuration options.
     *
     * @param string|null $option
     *
     * @return mixed
     */
    public function getDatabaseConfig(string $option = null): mixed
    {
        return $this->getConfig($option);
    }

}
