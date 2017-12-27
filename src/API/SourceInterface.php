<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\ProductSchemaInterface;
use AmaTeam\ElasticSearch\Schema\API\Source\SerializationException;

interface SourceInterface
{
    /**
     * @return ProductSchemaInterface[]
     *
     * @throws SerializationException
     */
    public function getAll(): array;
}
