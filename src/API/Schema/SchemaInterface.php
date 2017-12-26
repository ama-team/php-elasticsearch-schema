<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Schema;

interface SchemaInterface extends ParametrizedInterface
{
    public function getMapping(): MappingSchemaInterface;
    public function getIndex(): IndexSchemaInterface;

    /**
     * @return ConfigurationOptionInterface[]
     */
    public function getConfiguration(): array;
}
