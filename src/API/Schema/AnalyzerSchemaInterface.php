<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Schema;

interface AnalyzerSchemaInterface extends ParametrizedInterface
{
    /**
     * @return AnalyzerInterface[]
     */
    public function getTypes(): array;
}
