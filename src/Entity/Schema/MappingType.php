<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\MappingTypeInterface;
use JMS\Serializer\Annotation as Serializer;

class MappingType implements MappingTypeInterface
{
    use ParameterizedEntityTrait;
}
