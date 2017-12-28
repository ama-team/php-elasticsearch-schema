<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source\Normalization;

use AmaTeam\ElasticSearch\Schema\Entity\Schema\ConfigurationOption;
use AmaTeam\ElasticSearch\Schema\Entity\Schema\IndexSetting;
use AmaTeam\ElasticSearch\Schema\Entity\Schema\Parameter;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class TypeCoercingPreProcessor implements EventSubscriberInterface
{
    const CLASSES = [
        Parameter::class,
        ConfigurationOption::class,
        IndexSetting::class
    ];

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
        if (!in_array($type, self::CLASSES, true)) {
            return;
        }
        $mapper = function (array $data) {
            $type = $data['type'] ?? null;
            if (is_string($type)) {
                $data['type'] = [$type];
            }
            return $data;
        };
        SimpleDataProcessor::apply($event, $mapper);
    }
}
