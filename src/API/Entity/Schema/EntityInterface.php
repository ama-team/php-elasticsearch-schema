<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Entity\Schema;

interface EntityInterface
{
    public function getId(): ?string;
    public function getTitle(): ?string;
    public function getSummary(): ?string;
    public function getDescription(): ?string;
    public function getExtends(): ?string;
    public function isDeprecated(): ?bool;
    public function isRemoved(): ?bool;

    /**
     * @return object
     */
    public function getMetadata();
}
