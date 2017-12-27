<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Source;

interface LoaderInterface
{
    public function supports(string $resource): bool;
    /**
     * @param string $resource
     * @return object
     */
    public function load(string $resource): ?string;
}
