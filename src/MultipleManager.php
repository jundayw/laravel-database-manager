<?php

namespace Nacosvel\DatabaseManager;

use Nacosvel\Contracts\DatabaseManager\DatabaseManagerInterface;
use Nacosvel\DataSourceManager\MultipleManager as MultipleInstanceManager;

class MultipleManager extends MultipleInstanceManager implements DatabaseManagerInterface
{
    /**
     * @inheritDoc
     */
    public function getDefaultInstance(): string
    {
        return $this->app['config']['database-manager.default'];
    }

    /**
     * @inheritDoc
     */
    public function setDefaultInstance(string $name): void
    {
        $this->app['config']['database-manager.default'] = $name;
    }

    /**
     * @inheritDoc
     */
    public function getInstanceConfig(string $name): ?array
    {
        return $this->app['config']['database-manager.drivers'][$name] ?? null;
    }

}
