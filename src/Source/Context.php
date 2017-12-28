<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source;

use AmaTeam\ElasticSearch\Schema\API\Source\ContextInterface;
use AmaTeam\ElasticSearch\Schema\API\Source\ResourceInterface;

class Context implements ContextInterface
{
    /**
     * @var ResourceInterface[]
     */
    private $resources = [];
    /**
     * @var ResourceInterface|null
     */
    private $resource;

    /**
     * @var array
     */
    private $attributes = [];

    public function setAttribute(string $name, $value): ContextInterface
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    public function getAttribute(string $name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function getProcessedResources(): array
    {
        return $this->resources;
    }

    public function getProcessedResource(): ?ResourceInterface
    {
        return $this->resource;
    }

    public function pushResource(ResourceInterface $resource): Context
    {
        $this->resources[] = $resource;
        return $this;
    }

    public function setCurrentResource(ResourceInterface $resource): Context
    {
        $this->resource = $resource;
        return $this;
    }

    public function getResource(string $uri): ?ResourceInterface
    {
        foreach ($this->resources as $resource) {
            if ($resource->getUri() === $uri) {
                return $resource;
            }
        }
        return null;
    }

    public function hasResource(string $uri): bool
    {
        return $this->getResource($uri) !== null;
    }
}
