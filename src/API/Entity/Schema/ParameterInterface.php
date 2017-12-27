<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Entity\Schema;

interface ParameterInterface extends EntityInterface
{
    /**
     * @return string[]|null
     */
    public function getType(): ?array;
    public function isNullable(): ?bool;
    public function isEnum(): ?bool;

    /**
     * @return string[]|null
     */
    public function getValues(): ?array;

    /**
     * @return ConstraintSpecificationInterface[]|null
     */
    public function getConstraints(): ?array;

    /**
     * @return mixed
     */
    public function getDefault();
}
