<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\ParameterInterface;
use JMS\Serializer\Annotation as Serializer;

trait ParametrizedTrait
{
    /**
     * @Serializer\Type("array<string, AmaTeam\ElasticSearch\Schema\Entity\Schema\Parameter>")
     *
     * @var ParameterInterface[]
     */
    private $parameters = [];

    /**
     * @return ParameterInterface[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param ParameterInterface[] $parameters
     * @return $this
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    public function getParameter(string $name): ?ParameterInterface
    {
        return $this->parameters[$name] ?? null;
    }

    /**
     * @param string $name
     * @param ParameterInterface|null $parameter
     * @return $this
     */
    public function setParameter(string $name, ?ParameterInterface $parameter)
    {
        $this->parameters[$name] = $parameter;
        return $this;
    }
}
