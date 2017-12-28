<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Source;

use League\Uri\Interfaces\Uri;

interface LoaderInterface
{
    /**
     * @param Uri $uri
     * @param ContextInterface $context
     * @return ResourceInterface|null
     */
    public function load(Uri $uri, ContextInterface $context): ?ResourceInterface;

    /**
     * Returns list of schemes this loader supports.
     *
     * @return string[]
     */
    public function getSchemes(): array;
}
