<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Exception;

use AmaTeam\ElasticSearch\Schema\API\ExceptionInterface;
use RuntimeException as SPLRuntimeException;
use Throwable;

class RuntimeException extends SPLRuntimeException implements ExceptionInterface
{
    public function __construct(string $message = '', Throwable $cause = null)
    {
        parent::__construct($message, 0, $cause);
    }
}
