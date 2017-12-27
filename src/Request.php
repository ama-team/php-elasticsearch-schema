<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema;

use AmaTeam\ElasticSearch\Schema\API\RequestInterface;

class Request implements RequestInterface
{
    /**
     * @var string
     */
    private $product;
    /**
     * @var string|null
     */
    private $version;

    /**
     * @param string $product
     * @param null|string $version
     */
    public function __construct(string $product, string $version = null)
    {
        $this->product = $product;
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product;
    }

    /**
     * @return null|string
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }
}
