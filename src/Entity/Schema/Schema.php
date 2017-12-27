<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\ConfigurationOptionInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\IndexSchemaInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\MappingSchemaInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\SchemaInterface;
use JMS\Serializer\Annotation as Serializer;

class Schema implements SchemaInterface
{
    use ParametrizedTrait;
    /**
     * @Serializer\Type("AmaTeam\ElasticSearch\Schema\Entity\Schema\MappingSchema")
     *
     * @var MappingSchemaInterface
     */
    private $mapping;
    /**
     * @Serializer\Type("AmaTeam\ElasticSearch\Schema\Entity\Schema\IndexSchema")
     *
     * @var IndexSchemaInterface
     */
    private $index;

    /**
     * @Serializer\Type("array<AmaTeam\ElasticSearch\Schema\Entity\Schema\ConfigurationOption>")
     *
     * @var ConfigurationOptionInterface[]
     */
    private $configuration = [];

    /**
     * @param MappingSchemaInterface $mapping
     * @param IndexSchemaInterface $index
     * @param ConfigurationOptionInterface[] $configuration
     */
    public function __construct(
        MappingSchemaInterface $mapping = null,
        IndexSchemaInterface $index = null,
        array $configuration = []
    ) {
        $this->mapping = $mapping ?? new MappingSchema();
        $this->index = $index ?? new IndexSchema();
        $this->configuration = $configuration;
    }

    /**
     * @return MappingSchemaInterface
     */
    public function getMapping(): MappingSchemaInterface
    {
        return $this->mapping;
    }

    /**
     * @param MappingSchemaInterface $mapping
     * @return $this
     */
    public function setMapping(MappingSchemaInterface $mapping)
    {
        $this->mapping = $mapping;
        return $this;
    }

    /**
     * @return IndexSchemaInterface
     */
    public function getIndex(): IndexSchemaInterface
    {
        return $this->index;
    }

    /**
     * @param IndexSchemaInterface $index
     * @return $this
     */
    public function setIndex(IndexSchemaInterface $index)
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @return ConfigurationOptionInterface[]
     */
    public function getConfiguration(): array
    {
        return $this->configuration;
    }

    /**
     * @param ConfigurationOptionInterface[] $configuration
     * @return $this
     */
    public function setConfiguration(array $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }
}
