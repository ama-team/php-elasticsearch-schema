<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source;

use AmaTeam\ElasticSearch\Schema\Source\Serialization\DeserializationContextFactory;
use AmaTeam\ElasticSearch\Schema\Source\Serialization\KeyAssuringPreProcessor;
use AmaTeam\ElasticSearch\Schema\Source\Serialization\SerializationContextFactory;
use AmaTeam\ElasticSearch\Schema\Source\Serialization\TypeCoercingPreProcessor;
use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;

class Normalizer
{
    /**
     * @var ArrayTransformerInterface
     */
    private $transformer;

    public function __construct()
    {
        $strategy = new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy());
        $this->transformer = SerializerBuilder::create()
            ->configureListeners(function (EventDispatcher $dispatcher) use ($strategy) {
                $dispatcher->addSubscriber(new TypeCoercingPreProcessor());
                $dispatcher->addSubscriber(new KeyAssuringPreProcessor($strategy));
            })
            ->setDeserializationContextFactory(new DeserializationContextFactory())
            ->setSerializationContextFactory(new SerializationContextFactory())
            ->build();
    }

    public function normalize($source, $type)
    {
        $payload = $this->transformer->toArray($source);
        return $this->transformer->fromArray($payload, $type);
    }
}
