<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Entity\Schema;

interface ProductSchemaInterface
{
    /**
     * @return string
     */
    public function getProduct(): ?string;
    /**
     * @return SchemaInterface[]
     */
    public function getVersions(): array;
}
