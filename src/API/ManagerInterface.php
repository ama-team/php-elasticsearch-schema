<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API;

use AmaTeam\ElasticSearch\Schema\API\Schema\ProductSchemaInterface;
use AmaTeam\ElasticSearch\Schema\API\Schema\SchemaInterface;

interface ManagerInterface
{
    public function registerSource(SourceInterface $source): ManagerInterface;

    /**
     * @return ProductSchemaInterface[][]
     */
    public function getAll(): array;
    /**
     * @return ProductSchemaInterface[]
     */
    public function loadAll(): array;
    public function load(string $product): ProductSchemaInterface;
    public function assemble(RequestInterface ...$requests): SchemaInterface;
}
