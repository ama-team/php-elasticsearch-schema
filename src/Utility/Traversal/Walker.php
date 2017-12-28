<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Utility\Traversal;

use AmaTeam\ElasticSearch\Schema\API\Exception\RuntimeException;

class Walker
{
    /**
     * @var callable[]
     */
    private $listeners = [];
    /**
     * @var Node[]
     */
    private $visited = [];
    /**
     * @var Node[]
     */
    private $pile = [];

    /**
     * @param callable[] $listeners
     */
    public function __construct(callable ...$listeners)
    {
        $this->listeners = $listeners;
    }

    public function registerListener(callable $listener)
    {
        $this->listeners[] = $listener;
    }

    public function walk($structure)
    {
        $root = new Node($structure);
        $this->pile = [$root];
        $this->visited = [];
        while (sizeof($this->pile) > 0) {
            $cursor = $this->pile[sizeof($this->pile) - 1];
            if ($cursor->isExamined()) {
                array_pop($this->pile);
                continue;
            }
            $this->assertNotVisited($cursor);
            $this->recordVisit($cursor);
            foreach ($this->listeners as $listener) {
                $listener($cursor);
            }
            $this->recordVisit($cursor);
            $cursor->setExamined(true);
            $children = $this->fetchChildren($cursor);
            if (empty($children)) {
                $this->propagateChanges($cursor);
                array_pop($this->pile);
                continue;
            }
            foreach ($children as $child) {
                $this->pile[] = $child;
            }
            $this->propagateChanges($cursor);
        }
        return $root->getValue();
    }

    private function recordVisit(Node $node)
    {
        $value = $node->getValue();
        if (!is_object($value)) {
            return;
        }
        $this->visited[spl_object_hash($node->getValue())] = $node;
    }

    private function assertNotVisited(Node $node)
    {
        $value = $node->getValue();
        if (!is_object($value)) {
            return;
        }
        $id = spl_object_hash($value);
        if (!isset($this->visited[$id])) {
            return;
        }
        $visit = $this->visited[$id];
        if ($visit === $node) {
            return;
        }
        $previous = Segment::format($visit->getPath());
        $current = Segment::format($node->getPath());
        $template = 'Found cyclic reference: `%s` has been found at `%s` again';
        // TODO: dedicated exception
        throw new RuntimeException(sprintf($template, $previous, $current));
    }

    private function propagateChanges(Node $child)
    {
        if (!$child->getParent()) {
            return;
        }
        $parent = $child->getParent();
        $segment = $child->getSegment();
        $target = $parent->getValue();
        if ($segment->getType() === Segment::TYPE_ELEMENT) {
            $target[$segment->getValue()] = $child->getValue();
            $parent->setValue($target);
            return;
        }
        $property = $segment->getValue();
        $parent->getValue()->$property = $child->getValue();
    }

    /**
     * @param Node $cursor
     * @return Node[]
     */
    private function fetchChildren(Node $cursor): array
    {
        $value = $cursor->getValue();
        $type = Segment::TYPE_ELEMENT;
        if (is_object($value)) {
            // todo: this works only for stdClass
            $value = (array) $value;
            $type = Segment::TYPE_PROPERTY;
        }
        if (!is_array($value)) {
            return [];
        }
        $result = [];
        foreach ($cursor->getValue() as $key => $value) {
            $segment = new Segment($type, $key);
            $result[] = new Node($value, $cursor, $segment);
        }
        return $result;
    }
}
