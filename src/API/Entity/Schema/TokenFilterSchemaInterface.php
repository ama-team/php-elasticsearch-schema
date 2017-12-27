<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Entity\Schema;

interface TokenFilterSchemaInterface extends ParametrizedInterface
{
    /**
     * @return TokenFilterInterface[]
     */
    public function getTypes(): array;
}
