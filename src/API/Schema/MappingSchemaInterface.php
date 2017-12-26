<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Schema;

interface MappingSchemaInterface extends ParametrizedInterface
{
    /**
     * @return MappingTypeInterface[]
     */
    public function getTypes(): array;
}
