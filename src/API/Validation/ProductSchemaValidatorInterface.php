<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Validation;

use Symfony\Component\Validator\ConstraintViolationListInterface;

interface ProductSchemaValidatorInterface
{
    /**
     * @param object $schema
     * @return ConstraintViolationListInterface
     */
    public function validate($schema): ConstraintViolationListInterface;
}
