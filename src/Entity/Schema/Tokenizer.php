<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\TokenizerInterface;

class Tokenizer implements TokenizerInterface
{
    use ParameterizedEntityTrait;
}
