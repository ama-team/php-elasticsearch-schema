<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

class VersionSchema extends Schema
{
    /**
     * @var string
     */
    private $version;

    /**
     * @return string
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setVersion(string $version)
    {
        $this->version = $version;
        return $this;
    }
}
