<?php

namespace Microsoft\Dynamics\Http;

use Microsoft\Core\Http\IAuthenticationProvider;

/**
 * Interface for the base client.
 */
interface IBaseClient
{
    /**
     * Gets the IAuthenticationProvider for authenticating HTTP requests.
     * @var IAuthenticationProvider
     */
    public function getAuthenticationProvider();

    /**
     * Gets the base URL for requests of the client.
     * @var string
     */
    public function getBaseUrl();

    /**
     * Gets the IHttpProvider for sending HTTP requests.
     * @var \Microsoft\Core\Http\IHttpProvider
     */
    public function getHttpProvider();
}
