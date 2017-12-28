<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Utility\Traversal;

class Segment
{
    const TYPE_PROPERTY = 'property';
    const TYPE_ELEMENT = 'element';

    /**
     * @var string
     */
    private $type;
    /**
     * @var mixed
     */
    private $value;

    /**
     * @param string $type
     * @param mixed $value
     */
    public function __construct(string $type, $value)
    {
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param Segment[] $segments
     * @return string
     */
    public static function format(array $segments): string
    {
        $builder = ['$'];
        foreach ($segments as $segment) {
            $property = $segment->getType() === self::TYPE_PROPERTY;
            $prefix = $property ? '.' : '[';
            $suffix = $property ? '' : ']';
            $builder[] = $prefix . $segment->getValue() . $suffix;
        }
        return implode('', $builder);
    }
}
