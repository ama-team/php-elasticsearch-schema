<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source;

use AmaTeam\ElasticSearch\Schema\API\Exception\RuntimeException;
use AmaTeam\ElasticSearch\Schema\API\Source\LoaderInterface;

class ResolvingLoader implements LoaderInterface
{
    /**
     * @var LoaderRegistry
     */
    private $registry;

    /**
     * @param LoaderRegistry $registry
     */
    public function __construct(LoaderRegistry $registry)
    {
        $this->registry = $registry;
    }

    public function supports(string $resource): bool
    {
        return $this->registry->find($resource) !== null;
    }

    public function load(string $resource): ?string
    {
        $loader = $this->registry->find($resource);
        if (!$loader) {
            $message = "Couldn't find loader for resource `$resource`";
            throw new RuntimeException($message);
        }
        return $loader->load($resource);
    }
}
