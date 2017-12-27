<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\MappingSchemaInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\MappingTypeInterface;
use JMS\Serializer\Annotation as Serializer;

class MappingSchema implements MappingSchemaInterface
{
    use ParametrizedTrait;
    /**
     * @Serializer\Type("array<string, AmaTeam\ElasticSearch\Schema\Entity\Schema\MappingType>")
     *
     * @var MappingTypeInterface[]
     */
    private $types = [];

    /**
     * @return MappingTypeInterface[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param MappingTypeInterface[] $types
     * @return $this
     */
    public function setTypes(array $types)
    {
        $this->types = $types;
        return $this;
    }
}
