<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\IndexSettingInterface;
use JMS\Serializer\Annotation as Serializer;

class IndexSetting extends Parameter implements IndexSettingInterface
{
    /**
     * @Serializer\Type("boolean")
     *
     * @var bool|null
     */
    private $static;

    /**
     * @return bool
     */
    public function isStatic(): ?bool
    {
        return $this->static;
    }

    /**
     * @param bool $static
     * @return $this
     */
    public function setStatic(bool $static)
    {
        $this->static = $static;
        return $this;
    }

    public function isDynamic(): ?bool
    {
        return !$this->isStatic();
    }
}
