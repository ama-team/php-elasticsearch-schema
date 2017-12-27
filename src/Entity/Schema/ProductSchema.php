<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\ProductSchemaInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\SchemaInterface;
use JMS\Serializer\Annotation as Serializer;

class ProductSchema implements ProductSchemaInterface
{
    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $product;
    /**
     * @Serializer\Type("array<string, AmaTeam\ElasticSearch\Schema\Entity\Schema\VersionSchema>")
     *
     * @var SchemaInterface[]
     */
    private $versions = [];

    /**
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product;
    }

    /**
     * @param string $product
     * @return $this
     */
    public function setProduct(string $product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return SchemaInterface[]
     */
    public function getVersions(): array
    {
        return $this->versions;
    }

    /**
     * @param SchemaInterface[] $versions
     * @return $this
     */
    public function setVersions(array $versions)
    {
        $this->versions = $versions;
        return $this;
    }

    /**
     * @Serializer\PostDeserialize()
     */
    public function postDeserialize()
    {
        foreach ($this->versions as $version => $instance) {
            if ($instance instanceof VersionSchema) {
                $instance->setVersion($version);
            }
        }
    }
}
