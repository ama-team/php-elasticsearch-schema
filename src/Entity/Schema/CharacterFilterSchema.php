<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\CharacterFilterInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\CharacterFilterSchemaInterface;
use JMS\Serializer\Annotation as Serializer;

class CharacterFilterSchema implements CharacterFilterSchemaInterface
{
    use ParametrizedTrait;

    /**
     * @Serializer\Type("array<AmaTeam\ElasticSearch\Schema\Entity\Schema\CharacterFilter>")
     *
     * @var CharacterFilterInterface[]
     */
    private $types = [];

    /**
     * @return CharacterFilterInterface[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param CharacterFilterInterface[] $types
     * @return $this
     */
    public function setTypes(array $types)
    {
        $this->types = $types;
        return $this;
    }
}
