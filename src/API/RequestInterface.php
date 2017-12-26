<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API;

interface RequestInterface
{
    public function getProduct(): string;
    public function getVersion(): ?string;
}
