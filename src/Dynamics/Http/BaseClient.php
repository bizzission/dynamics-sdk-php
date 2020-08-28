<?php

namespace Microsoft\Dynamics\Http;

use Closure;
//use Microsoft\Core\Http\HttpProvider;
//use Microsoft\Core\Http\IAuthenticationProvider;
//use Microsoft\Core\Http\IHttpProvider;
use Microsoft\Dynamics\Exception\DynamicsException;
use SaintSystems\OData\IAuthenticationProvider;
use SaintSystems\OData\IHttpProvider;

/**
 * A default IBaseClient implementation.
 */
class BaseClient implements IBaseClient
{
    /**
     * The base service URL. For example, "https://contoso.crm.dynamics.com/api/data/v8.0."
     * @var string
     */
    private $baseUrl;

    /**
     * The IAuthenticationProvider for authenticating request messages.
     * @var IAuthenticationProvider
     */
    private $authenticationProvider;

    /**
     * The IHttpProvider for sending HTTP requests.
     * @var IHttpProvider
     */
    private $httpProvider;

    /**
     * Constructs a new BaseClient.
     * @param string $baseUrl The base service URL. For example, "https://contoso.crm.dynamics.com/api/data/v8.0."
     * @param Closure $authenticationProvider The IAuthenticationProvider for authenticating request messages.
     * @param IHttpProvider|null $httpProvider The IHttpProvider for sending requests.
     * @throws DynamicsException
     */
    public function __construct($baseUrl, 
                                Closure $authenticationProvider, 
                                IHttpProvider $httpProvider = null)
    {
        $this->setBaseUrl($baseUrl);
        $this->authenticationProvider = $authenticationProvider;
        // TODO: This one needs a fix class doesn't exists
        $this->httpProvider = $httpProvider ?? new HttpProvider();//new HttpProvider(new Serializer());
    }

    /**
     * Gets the IAuthenticationProvider for authenticating requests.
     * @return Closure|IAuthenticationProvider
     * @var IAuthenticationProvider
     */
    public function getAuthenticationProvider()
    {
        return $this->authenticationProvider;
    }

    /**
     * Gets the base URL for requests of the client.
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * Sets the base URL for requests of the client.
     * @param void
     * @throws DynamicsException
     */
    public function setBaseUrl($value)
    {
        if (empty($value))
        {
            throw new DynamicsException('Base URL is Missing');
                // new Error
                // {
                //     Code = ErrorConstants.Codes.InvalidRequest,
                //     Message = ErrorConstants.Messages.BaseUrlMissing,
                // });
        }

        $this->baseUrl = rtrim($value, '/');
    }

    /**
     * Gets the IHttpProvider for sending HTTP requests.
     * @return HttpProvider|IHttpProvider
     * @var IHttpProvider
     */
    public function getHttpProvider()
    {
        return $this->httpProvider;
    }

}
