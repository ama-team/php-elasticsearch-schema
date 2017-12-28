<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source\Serialization;

use AmaTeam\ElasticSearch\Schema\API\Source\SerializationException;
use AmaTeam\ElasticSearch\Schema\API\Source\SerializerInterface;
use Symfony\Component\Yaml\Yaml;
use Throwable;

class YamlSerializer implements SerializerInterface
{
    public function deserialize(string $content)
    {
        try {
            return Yaml::parse($content, Yaml::PARSE_OBJECT_FOR_MAP);
        } catch (Throwable $e) {
            $message = 'Failed to parse YAML: ' . $e->getMessage();
            throw new SerializationException($message, $e);
        }
    }
}
