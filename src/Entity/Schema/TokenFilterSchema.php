<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\TokenFilterInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\TokenFilterSchemaInterface;
use JMS\Serializer\Annotation as Serializer;

class TokenFilterSchema implements TokenFilterSchemaInterface
{
    use ParametrizedTrait;

    /**
     * @Serializer\Type("array<string, AmaTeam\ElasticSearch\Schema\Entity\Schema\TokenFilter>")
     *
     * @var TokenFilterInterface[]
     */
    private $types = [];

    /**
     * @return TokenFilterInterface[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param TokenFilterInterface[] $types
     * @return $this
     */
    public function setTypes(array $types)
    {
        $this->types = $types;
        return $this;
    }
}
