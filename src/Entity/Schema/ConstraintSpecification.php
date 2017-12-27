<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\ConstraintSpecificationInterface;
use JMS\Serializer\Annotation as Serializer;

class ConstraintSpecification implements ConstraintSpecificationInterface
{
    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $type;
    /**
     * @Serializer\Type("object")
     *
     * @var object
     */
    private $configuration;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return object
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @param object $configuration
     * @return $this
     */
    public function setConfiguration(object $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }
}
