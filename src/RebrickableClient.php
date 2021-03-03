<?php declare(strict_types=1);
namespace Zogot\Rebrickable\API\Client;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Zogot\Rebrickable\API\Client\Common\Request\RebrickableRequestInterface;
use function rtrim;

class RebrickableClient
{
    /**
     * @var ClientInterface
     */
    protected ClientInterface $client;

    /**
     * @var RequestFactoryInterface
     */
    protected RequestFactoryInterface $requestFactory;

    /**
     * @var string
     */
    protected string $baseUrl = "https://rebrickable.com";

    /**
     * RebrickableClient constructor.
     * @param ClientInterface $client
     * @param RequestFactoryInterface $requestFactory
     */
    public function __construct(ClientInterface $client, RequestFactoryInterface $requestFactory)
    {
        $this->client = $client;
        $this->requestFactory = $requestFactory;
    }

    /**
     * Send a Rebrickable request through this objects ClientInterface. Will apply the needed
     * values between all requests, like API Key.
     *
     * @param RebrickableRequestInterface $rebrickableRequest
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function send(RebrickableRequestInterface $rebrickableRequest): ResponseInterface
    {
        $requestMethod = $rebrickableRequest->getMethod();
        $requestPath = $this->buildUrl($rebrickableRequest->getPath());

        $request = $this->requestFactory->createRequest($requestMethod, $requestPath);

        return $this->client->sendRequest($request);
    }

    /**
     * Change the base url for where the requests are made to.
     *
     * Default value is "https://rebrickable.com"
     *
     * @param string $baseUrl
     * @return $this
     */
    public function setBaseUrl(string $baseUrl): self
    {
        $this->baseUrl = rtrim($baseUrl, "/");
        return $this;
    }

    /**
     * @param string $requestUrl
     * @return string
     */
    protected function buildUrl(string $requestUrl): string
    {
        return "{$this->baseUrl}{$requestUrl}";
    }

}