<?php

namespace Nacosvel\DatabaseManager;

class MultipleManager extends MultipleInstanceManager
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
