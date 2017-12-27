<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Entity\Schema;

interface IndexSettingInterface extends ParameterInterface
{
    public function isStatic(): ?bool;
    public function isDynamic(): ?bool;
}
