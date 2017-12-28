<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source\File;

use AmaTeam\ElasticSearch\Schema\API\Exception\RuntimeException;
use AmaTeam\ElasticSearch\Schema\API\Source\ContextInterface;
use AmaTeam\ElasticSearch\Schema\API\Source\LoaderInterface;
use AmaTeam\ElasticSearch\Schema\API\Source\ResourceInterface;
use AmaTeam\ElasticSearch\Schema\Helper\Uris;
use AmaTeam\ElasticSearch\Schema\Source\Resource;
use AmaTeam\ElasticSearch\Schema\Source\Serialization\SerializerRegistry;
use League\Flysystem\Adapter\Local;
use League\Flysystem\FileNotFoundException;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemInterface;
use League\Uri\Interfaces\Uri;

class Loader implements LoaderInterface
{
    const SCHEME = 'file';
    /**
     * @var FilesystemInterface
     */
    private $filesystem;
    /**
     * @var SerializerRegistry
     */
    private $serializers;

    /**
     * @param FilesystemInterface $filesystem
     * @param SerializerRegistry $serializers
     */
    public function __construct(
        FilesystemInterface $filesystem,
        SerializerRegistry $serializers
    ) {
        $this->filesystem = $filesystem;
        $this->serializers = $serializers;
    }

    public function getSchemes(): array
    {
        return [self::SCHEME];
    }

    public function load(Uri $uri, ContextInterface $context): ?ResourceInterface
    {
        $path = Uris::fileUriPath($uri);
        $extension = strtolower($path->getExtension());
        $serializer = $this->serializers->find($extension);
        if (!$serializer) {
            $template = 'Couldn\'t find deserializer for file `%s`';
            throw new RuntimeException(sprintf($template, $path));
        }
        try {
            $content = $this->filesystem->read((string) $path);
            $payload = $serializer->deserialize($content);
            return new Resource($uri, $payload);
        } catch (FileNotFoundException $e) {
            $message = sprintf('File `%s` doesn\'t exist', $path);
            throw new RuntimeException($message, $e);
        }
    }

    public static function getDefault(): Loader
    {
        $filesystem = new Filesystem(new Local('/'));
        return new Loader($filesystem, SerializerRegistry::getDefault());
    }
}
