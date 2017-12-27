<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Entity\Schema;

interface TemplateInterface
{
    /**
     * @return string[]
     */
    public function getChildren(): array;
}
