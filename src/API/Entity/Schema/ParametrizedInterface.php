<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Entity\Schema;

interface ParametrizedInterface
{
    /**
     * @return ParameterInterface[]
     */
    public function getParameters();
}
