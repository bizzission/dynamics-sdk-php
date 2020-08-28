<?php

namespace SaintSystems\OData;

class HttpRequestMessage
{
    /**
     * Gets or sets the body of the HTTP message.
     * @var string
     */
    public $body;

    /**
     * Gets or sets whether this HTTP message returns a stream
     * @var bool
     */
    public $returnsStream = false;

    /**
     * Gets the collection of HTTP request headers.
     * @var array
     */
    public $headers;

    /**
     * Gets or sets the HTTP method used by the HTTP request message.
     * @var HttpMethod
     */
    public $method;

    /**
     * Gets a set of properties for the HTTP request.
     * @var array
     */
    public $properties;

    /**
     * Gets or sets the Uri used for the HTTP request.
     * @var string
     */
    public $requestUri;

    /**
     * Gets or sets the HTTP message version.
     * @var string
     */
    public $version;

    /**
     * HttpRequestMessage constructor.
     * @param HttpMethod|string $method
     * @param null $requestUri
     */
//    public function __construct(HttpMethod $method = HttpMethod::GET, $requestUri = null)
    public function __construct(HttpMethod $method, $requestUri = null)
    {
        // TODO: To be seen. if it provides an error or if it's correct.
        if(!$method) {
            $method = HttpMethod::GET;
        }

        $this->method = $method;
        $this->requestUri = $requestUri;
        $this->headers = array();
        $this->returnsStream = false;
    }
}
