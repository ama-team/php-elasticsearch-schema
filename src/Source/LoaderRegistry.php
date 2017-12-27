<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source;

use AmaTeam\ElasticSearch\Schema\API\Source\LoaderInterface;

class LoaderRegistry
{
    /**
     * @var LoaderInterface[]
     */
    private $registry = [];

    public function register(LoaderInterface $loader): LoaderRegistry
    {
        $this->registry[] = $loader;
        return $this;
    }

    public function deregister(LoaderInterface $loader): LoaderRegistry
    {
        $filter = function ($entry) use ($loader) {
            return $entry !== $loader;
        };
        $this->registry = array_filter($this->registry, $filter);
        return $this;
    }

    public function find(string $resource): ?LoaderInterface
    {
        foreach ($this->registry as $loader) {
            if ($loader->supports($resource)) {
                return $loader;
            }
        }
        return null;
    }
}
