<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Source;

use League\Uri\Interfaces\Uri;

interface ResourceInterface
{
    public function getUri(): Uri;
    public function getContents();
}
