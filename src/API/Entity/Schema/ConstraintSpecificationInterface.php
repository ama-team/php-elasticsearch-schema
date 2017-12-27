<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Entity\Schema;

interface ConstraintSpecificationInterface
{
    public function getType(): string;

    /**
     * @return object
     */
    public function getConfiguration();
}
