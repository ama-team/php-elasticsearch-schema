<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Entity\Schema;

interface CharacterFilterSchemaInterface
{
    /**
     * @return CharacterFilterInterface[]
     */
    public function getTypes(): array;
}
