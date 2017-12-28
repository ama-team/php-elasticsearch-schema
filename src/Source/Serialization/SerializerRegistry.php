<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source\Serialization;

use AmaTeam\ElasticSearch\Schema\API\Source\SerializerInterface;

class SerializerRegistry
{
    private $registry = [];

    public function register(
        SerializerInterface $serializer,
        string ...$patterns
    ): SerializerRegistry {
        foreach ($patterns as $pattern) {
            $this->registry[$pattern] = $serializer;
        }
        return $this;
    }

    public function find(string $label): ?SerializerInterface
    {
        foreach ($this->registry as $pattern => $serializer) {
            if (preg_match('~' . $pattern . '~', $label)) {
                return $serializer;
            }
        }
        return null;
    }

    public static function getDefault()
    {
        return (new SerializerRegistry())
            ->register(new YamlSerializer(), 'ya?ml')
            ->register(new JsonSerializer(), 'json');
    }
}
