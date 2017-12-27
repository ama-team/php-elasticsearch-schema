<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source\Serialization;

use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class SimpleDataProcessor
{
    public static function apply(
        PreDeserializeEvent $event,
        callable $callable,
        $default = null
    ) {
        $data = $event->getData();
        $data = $data === null && $default !== null ? $default : $data;
        $data = is_object($data) ? (array) $data : $data;
        if (is_array($data)) {
            $event->setData($callable($data));
        }
    }
}
