<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source;

use AmaTeam\ElasticSearch\Schema\API\Source\LoaderInterface;
use AmaTeam\ElasticSearch\Schema\Source\File\Loader;
use League\Uri\Interfaces\Uri;

class LoaderRegistry
{
    /**
     * @var LoaderInterface[]
     */
    private $registry = [];
    /**
     * @var LoaderInterface|null
     */
    private $default;

    public function register(LoaderInterface $loader): LoaderRegistry
    {
        $this->registry[] = $loader;
        return $this;
    }

    public function deregister(LoaderInterface $loader): LoaderRegistry
    {
        $filter = function ($entry) use ($loader) {
            return $entry !== $loader;
        };
        $this->registry = array_filter($this->registry, $filter);
        return $this;
    }

    public function getDefaultLoader(): ?LoaderInterface
    {
        return $this->default;
    }

    public function setDefaultLoader(LoaderInterface $loader): LoaderRegistry
    {
        $this->default = $loader;
        return $this;
    }

    public function find(Uri $resource): ?LoaderInterface
    {
        foreach ($this->registry as $loader) {
            if (in_array($resource->getScheme(), $loader->getSchemes())) {
                return $loader;
            }
        }
        return $this->default;
    }

    public static function getDefault()
    {
        $fileLoader = Loader::getDefault();
        return (new LoaderRegistry())
            ->register($fileLoader)
            ->setDefaultLoader($fileLoader);
    }
}
