<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API;

use AmaTeam\ElasticSearch\Schema\API\Schema\ProductSchemaInterface;

interface SourceInterface
{
    /**
     * @return ProductSchemaInterface[]
     */
    public function getAll(): array;
}
