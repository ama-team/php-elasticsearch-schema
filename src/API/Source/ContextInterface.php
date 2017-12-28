<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Source;

interface ContextInterface
{
    public function setAttribute(string $name, $value): ContextInterface;
    public function getAttribute(string $name);
    public function getProcessedResources(): array;
    public function getProcessedResource(): ?ResourceInterface;
    public function hasResource(string $uri): bool;
    public function getResource(string $uri): ?ResourceInterface;
}
