<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source\Serialization;

use JMS\Serializer\ContextFactory\SerializationContextFactoryInterface;
use JMS\Serializer\SerializationContext;

class SerializationContextFactory implements
    SerializationContextFactoryInterface
{
    public function createSerializationContext()
    {
        return (new SerializationContext())->setSerializeNull(true);
    }
}
