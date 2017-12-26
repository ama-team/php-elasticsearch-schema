<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Schema;

interface TokenizerSchemaInterface extends ParametrizedInterface
{
    /**
     * @return TokenizerInterface[]
     */
    public function getTypes(): array;
}
