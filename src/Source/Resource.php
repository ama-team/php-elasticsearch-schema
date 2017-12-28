<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source;

use AmaTeam\ElasticSearch\Schema\API\Source\ResourceInterface;
use League\Uri\Interfaces\Uri;

class Resource implements ResourceInterface
{
    /**
     * @var Uri
     */
    private $uri;
    /**
     * @var object
     */
    private $contents;
    /**
     * @var array
     */
    private $attributes = [];

    /**
     * @param Uri $uri
     * @param object $content
     */
    public function __construct(Uri $uri, $content)
    {
        $this->uri = $uri;
        $this->contents = $content;
    }

    public function getUri(): Uri
    {
        return $this->uri;
    }

    public function getContents()
    {
        return $this->contents;
    }

    public function setAttribute(string $name, $value): Resource
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    public function getAttribute(string $name)
    {
        return $this->attributes[$name] ?? null;
    }
}
