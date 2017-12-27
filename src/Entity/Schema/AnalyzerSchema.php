<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\AnalyzerInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\AnalyzerSchemaInterface;
use JMS\Serializer\Annotation as Serializer;

class AnalyzerSchema implements AnalyzerSchemaInterface
{
    use ParametrizedTrait;

    /**
     * @Serializer\Type("array<AmaTeam\ElasticSearch\Schema\Entity\Schema\Analyzer>")
     *
     * @var AnalyzerInterface[]
     */
    private $types = [];

    /**
     * @return AnalyzerInterface[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param AnalyzerInterface[] $types
     * @return $this
     */
    public function setTypes(array $types)
    {
        $this->types = $types;
        return $this;
    }
}
