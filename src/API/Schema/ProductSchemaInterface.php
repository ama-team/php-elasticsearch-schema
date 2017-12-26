<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Schema;

interface ProductSchemaInterface
{
    /**
     * @return SchemaInterface[]
     */
    public function getVersions(): array;
}
