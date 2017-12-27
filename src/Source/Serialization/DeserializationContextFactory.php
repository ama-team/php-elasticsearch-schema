<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source\Serialization;

use JMS\Serializer\ContextFactory\DeserializationContextFactoryInterface;
use JMS\Serializer\DeserializationContext;

class DeserializationContextFactory implements
    DeserializationContextFactoryInterface
{
    public function createDeserializationContext()
    {
        return (new DeserializationContext())->setSerializeNull(true);
    }
}
