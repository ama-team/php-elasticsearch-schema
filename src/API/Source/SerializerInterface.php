<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Source;

interface SerializerInterface
{
    /**
     * @param string $content
     *
     * @return object
     *
     * @throws SerializationException
     */
    public function deserialize(string $content);
}
