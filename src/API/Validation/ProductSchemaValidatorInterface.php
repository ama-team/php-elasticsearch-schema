<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Validation;

use AmaTeam\ElasticSearch\Schema\API\Schema\ProductSchemaInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

interface ProductSchemaValidatorInterface
{
    public function validateProductSchema(ProductSchemaInterface $schema): ConstraintViolationListInterface;
}
