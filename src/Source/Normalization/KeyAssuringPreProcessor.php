<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source\Normalization;

use AmaTeam\ElasticSearch\Schema\Entity\Schema\AnalysisSchema;
use AmaTeam\ElasticSearch\Schema\Entity\Schema\AnalyzerSchema;
use AmaTeam\ElasticSearch\Schema\Entity\Schema\CharacterFilterSchema;
use AmaTeam\ElasticSearch\Schema\Entity\Schema\IndexSchema;
use AmaTeam\ElasticSearch\Schema\Entity\Schema\MappingSchema;
use AmaTeam\ElasticSearch\Schema\Entity\Schema\ProductSchema;
use AmaTeam\ElasticSearch\Schema\Entity\Schema\Schema;
use AmaTeam\ElasticSearch\Schema\Entity\Schema\TokenFilterSchema;
use AmaTeam\ElasticSearch\Schema\Entity\Schema\TokenizerSchema;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\Metadata\PropertyMetadata;
use JMS\Serializer\Naming\PropertyNamingStrategyInterface;
use ReflectionClass;
use ReflectionProperty;

class KeyAssuringPreProcessor implements EventSubscriberInterface
{
    const CLASSES = [
        ProductSchema::class,
        Schema::class,
        MappingSchema::class,
        IndexSchema::class,
        AnalysisSchema::class,
        AnalyzerSchema::class,
        TokenizerSchema::class,
        TokenFilterSchema::class,
        CharacterFilterSchema::class,
    ];

    private $classes = [];

    public function __construct(PropertyNamingStrategyInterface $strategy)
    {
        foreach (self::CLASSES as $className) {
            $reflection = new ReflectionClass($className);
            $filter = ~ReflectionProperty::IS_STATIC;
            $properties = $reflection->getProperties($filter);
            $keys = array_map(function (ReflectionProperty $property) use ($strategy) {
                $metadata = new PropertyMetadata(
                    $property->getDeclaringClass()->getName(),
                    $property->getName()
                );
                return $strategy->translateName($metadata);
            }, $properties);
            $this->classes[$className] = $keys;
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            [
                'event' => 'serializer.pre_deserialize',
                'method' => 'apply'
            ]
        ];
    }

    public function apply(PreDeserializeEvent $event)
    {
        $type = $event->getType()['name'];
        if (!isset($this->classes[$type])) {
            return;
        }
        SimpleDataProcessor::apply($event, function (array $data) use ($type) {
            foreach ($this->classes[$type] as $key) {
                if (!isset($data[$key])) {
                    $data[$key] = [];
                }
            }
            return $data;
        }, []);
    }
}
