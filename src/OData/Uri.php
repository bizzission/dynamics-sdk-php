<?php

namespace SaintSystems\OData;

class Uri
{
    // TODO: See if it's fixed using $uriParts
//    const URI_PARTS = [
//        'scheme',
//        'host',
//        'port',
//        'user',
//        'pass',
//        'path',
//        'query',
//        'fragment'
//    ];

    public $uriParts = array(
        'scheme',
        'host',
        'port',
        'user',
        'pass',
        'path',
        'query',
        'fragment'
    );

    public $scheme;

    public $host;

    public $port;

    public $user;

    public $pass;

    public $path;

    public $query;

    public $fragment;

    private $parsed;

    /**
     * @param string $uri
     */
    public function __construct($uri = null)
    {
        if ($uri == null) return;
        $uriParsed = parse_url($uri);
        $this->parsed = $uriParsed;
        foreach($this->uriParts as $uriPart) {
            if (isset($uriParsed[$uriPart])) {
                $this->$uriPart = $uriParsed[$uriPart];
            }
        }
    }

    public function __toString()
    {
        return http_build_url($this->parsed);
    }
}
