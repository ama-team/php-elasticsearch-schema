<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Source;

use AmaTeam\ElasticSearch\Schema\API\Exception\RuntimeException;
use AmaTeam\ElasticSearch\Schema\API\Source\ContextInterface;
use AmaTeam\ElasticSearch\Schema\API\Source\ResourceInterface;
use AmaTeam\ElasticSearch\Schema\Helper\Uris;
use AmaTeam\ElasticSearch\Schema\Utility\Traversal\Node;
use AmaTeam\ElasticSearch\Schema\Utility\Traversal\Segment;
use AmaTeam\ElasticSearch\Schema\Utility\Traversal\Walker;
use League\Uri\File;
use League\Uri\Interfaces\Uri;
use Remorhaz\JSON\Data\Reference\Selector;
use Remorhaz\JSON\Pointer\Pointer;

class Loader
{
    /**
     * @var LoaderRegistry
     */
    private $registry;

    /**
     * @param LoaderRegistry $registry
     */
    public function __construct(LoaderRegistry $registry = null)
    {
        $this->registry = $registry ?? LoaderRegistry::getDefault();
    }

    /**
     * @param Uri $uri
     * @return object
     */
    public function load(Uri $uri)
    {
        $loader = $this->registry->find($uri);
        if (!$loader) {
            $message = "Couldn't find loader for resource `$uri`";
            throw new RuntimeException($message);
        }
        $context = new Context();
        $resource = $this->retrieve($uri, $context);
        $contents = $resource->getContents();
        $listener = function (Node $node) use ($context) {
            $this->resolve($node, $context);
        };
        $walker = new Walker($listener);
        return $walker->walk($contents);
    }

    private function retrieve(Uri $uri, Context $context): ResourceInterface
    {
        $loader = $this->registry->find($uri);
        if (!$loader) {
            $message = "Couldn't find loader for resource `$uri`";
            throw new RuntimeException($message);
        }
        $resource = $loader->load($uri, $context);
        $context->pushResource($resource);
        $context->setCurrentResource($resource);
        return $resource;
    }

    private function resolve(Node $node, Context $context): void
    {
        $value = $node->getValue();
        if (!is_object($value) || !isset($value->{'$ref'})) {
            return;
        }
        $properties = get_object_vars($value);
        if (sizeof($properties) > 1) {
            $template = 'JSON pointer for node `%s` must not ' .
                'contain anything but `$ref` property';
            $path = Segment::format($node->getPath());
            throw new RuntimeException(sprintf($template, $path));
        }
        $uri = \League\Uri\Uri::createFromString($value->{'$ref'});
        $uri = $this->resolveUri($uri, $context);
        $target = $this->retrieve($uri, $context)->getContents();
        $selector = new Selector($target);
        $pointer = new Pointer($selector);
        $fragment = $uri->getFragment();
        $node->setValue($pointer->read($fragment)->getAsStruct());
    }

    // TODO: not suited for non-file uris
    private function resolveUri(Uri $uri, ContextInterface $context): Uri
    {
        $resource = $context->getProcessedResource();
        if (!$resource) {
            return $uri;
        }
        $currentPath = Uris::fileUriPath($resource->getUri());
        $targetPath = Uris::fileUriPath($uri);
        $path = $targetPath
            ->prepend($currentPath->getDirname())
            ->withoutDotSegments()
            ->withoutEmptySegments();
        return File::createFromString((string) $path);
    }
}
