<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API;

use AmaTeam\ElasticSearch\Schema\API\Schema\ProductSchemaInterface;

interface RegistryInterface
{
    public function register(string $product, ProductSchemaInterface $schema): RegistryInterface;

    /**
     * @param string $product
     * @return ProductSchemaInterface[]
     */
    public function get(string $product): array;
}
