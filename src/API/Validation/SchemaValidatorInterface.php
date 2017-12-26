<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Validation;

use AmaTeam\ElasticSearch\Schema\API\Schema\ProductSchemaInterface;
use AmaTeam\ElasticSearch\Schema\API\Schema\SchemaInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

interface SchemaValidatorInterface
{
    public function validateProduct(ProductSchemaInterface $schema): ConstraintViolationListInterface;
    public function validateSchema(SchemaInterface $schema): ConstraintViolationListInterface;
}
