<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\ConstraintSpecificationInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\ParameterInterface;
use JMS\Serializer\Annotation as Serializer;

class Parameter implements ParameterInterface
{
    use EntityTrait;

    /**
     * @Serializer\Type("array<string>")
     *
     * @var string[]|null
     */
    private $type;
    /**
     * @var mixed
     */
    private $default;
    /**
     * @Serializer\Type("bool")
     *
     * @var bool|null
     */
    private $nullable;
    /**
     * @Serializer\Type("bool")
     *
     * @var bool|null
     */
    private $enum;
    /**
     * @Serializer\Type("bool")
     *
     * @var array|null
     */
    private $values;
    /**
     * @Serializer\Type("array<AmaTeam\ElasticSearch\Schema\Entity\Schema\ConstraintSpecification>")
     *
     * @var ConstraintSpecificationInterface[]|null
     */
    private $constraints;

    /**
     * @return null|string[]
     */
    public function getType(): ?array
    {
        return $this->type;
    }

    /**
     * @param string|string[] $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = is_array($type) ? $type : [$type];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param mixed $default
     * @return $this
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isNullable(): ?bool
    {
        return $this->nullable;
    }

    /**
     * @param bool|null $nullable
     * @return $this
     */
    public function setNullable(?bool $nullable)
    {
        $this->nullable = $nullable;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isEnum(): ?bool
    {
        return $this->enum;
    }

    /**
     * @param bool|null $enum
     * @return $this
     */
    public function setEnum(?bool $enum)
    {
        $this->enum = $enum;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getValues(): ?array
    {
        return $this->values;
    }

    /**
     * @param array|null $values
     * @return $this
     */
    public function setValues(?array $values)
    {
        $this->values = $values;
        return $this;
    }

    /**
     * @return ConstraintSpecificationInterface[]|null
     */
    public function getConstraints(): ?array
    {
        return $this->constraints;
    }

    /**
     * @param ConstraintSpecificationInterface[]|null $constraints
     * @return $this
     */
    public function setConstraints(?array $constraints)
    {
        $this->constraints = $constraints;
        return $this;
    }
}
