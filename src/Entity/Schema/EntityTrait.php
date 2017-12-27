<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use JMS\Serializer\Annotation as Serializer;

trait EntityTrait
{
    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $id;
    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $title;
    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $summary;
    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $description;
    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $extends;
    /**
     * @Serializer\Type("bool")
     *
     * @var bool
     */
    private $removed;
    /**
     * @Serializer\Type("bool")
     *
     * @var bool
     */
    private $deprecated;
    /**
     * @Serializer\Type("object")
     *
     * @var object
     */
    private $metadata;

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     * @return $this
     */
    public function setSummary(string $summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getExtends(): ?string
    {
        return $this->extends;
    }

    /**
     * @param string $extends
     * @return $this
     */
    public function setExtends(string $extends)
    {
        $this->extends = $extends;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRemoved(): ?bool
    {
        return $this->removed;
    }

    /**
     * @param bool $removed
     * @return $this
     */
    public function setRemoved(bool $removed)
    {
        $this->removed = $removed;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDeprecated(): ?bool
    {
        return $this->deprecated;
    }

    /**
     * @param bool $deprecated
     * @return $this
     */
    public function setDeprecated(bool $deprecated)
    {
        $this->deprecated = $deprecated;
        return $this;
    }

    /**
     * @return object
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param object $metadata
     * @return $this
     */
    public function setMetadata(object $metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }
}
