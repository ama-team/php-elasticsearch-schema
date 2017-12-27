<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source;

use AmaTeam\ElasticSearch\Schema\API\Source\SerializationException;
use AmaTeam\ElasticSearch\Schema\API\Source\SerializerInterface;

class JsonSerializer implements SerializerInterface
{
    public function deserialize(string $content)
    {
        $data = json_decode($content);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $message = 'Failed to decode json content with following error: ' .
                json_last_error_msg();
            throw new SerializationException($message);
        }
        return $data;
    }
}
