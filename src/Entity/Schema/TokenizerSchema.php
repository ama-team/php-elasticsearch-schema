<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\TokenizerInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\TokenizerSchemaInterface;
use JMS\Serializer\Annotation as Serializer;

class TokenizerSchema implements TokenizerSchemaInterface
{
    use ParametrizedTrait;

    /**
     * @Serializer\Type("array<AmaTeam\ElasticSearch\Schema\Entity\Schema\Tokenizer>")
     *
     * @var TokenizerInterface[]
     */
    private $types = [];

    /**
     * @return TokenizerInterface[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param TokenizerInterface[] $types
     * @return $this
     */
    public function setTypes(array $types)
    {
        $this->types = $types;
        return $this;
    }
}
