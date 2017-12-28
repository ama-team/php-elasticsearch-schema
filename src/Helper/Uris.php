<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Helper;

use League\Uri\Components\HierarchicalPath;
use League\Uri\Interfaces\Uri;

class Uris
{
    public static function fileUriPath(Uri $uri): HierarchicalPath
    {
        $path = new HierarchicalPath($uri->getPath());
        if ($uri->getHost() && $uri->getHost() !== 'localhost') {
            $path = $path->prepend($uri->getHost());
        }
        return $path;
    }
}
