<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Utility\Traversal;

class Node
{
    /**
     * @var bool
     */
    private $examined = false;
    /**
     * @var Node
     */
    private $parent;
    /**
     * @var Segment
     */
    private $segment;
    /**
     * @var mixed
     */
    private $value;

    /**
     * @param mixed $value
     * @param Node $parent
     * @param Segment $segment
     */
    public function __construct($value, Node $parent = null, Segment $segment = null)
    {
        $this->value = $value;
        $this->parent = $parent;
        $this->segment = $segment;
    }

    /**
     * @param bool $examined
     * @return $this
     */
    public function setExamined(bool $examined)
    {
        $this->examined = $examined;
        return $this;
    }

    /**
     * @return bool
     */
    public function isExamined(): bool
    {
        return $this->examined;
    }

    /**
     * @return Segment[]
     */
    public function getPath(): array
    {
        $path = [];
        $cursor = $this;
        while ($cursor->getParent()) {
            array_unshift($path, $cursor->getSegment());
            $cursor = $cursor->getParent();
        }
        return $path;
    }

    public function getFormattedPath(): string
    {
        return Segment::format($this->getPath());
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return Node
     */
    public function getParent(): ?Node
    {
        return $this->parent;
    }

    /**
     * @return Segment
     */
    public function getSegment(): ?Segment
    {
        return $this->segment;
    }
}
