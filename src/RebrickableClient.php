<?php declare(strict_types=1);
namespace Zogot\Rebrickable\API\Client;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
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
    protected string $apiKey;

    /**
     * @var string
     */
    protected string $baseUrl = "https://rebrickable.com";

    /**
     * RebrickableClient constructor.
     * @param ClientInterface $client
     * @param RequestFactoryInterface $requestFactory
     * @param string $apiKey
     */
    public function __construct(ClientInterface $client, RequestFactoryInterface $requestFactory, string $apiKey)
    {
        $this->client = $client;
        $this->requestFactory = $requestFactory;
        $this->apiKey = $apiKey;
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
        $requestPath   = $this->buildUrl($rebrickableRequest->getPath());

        // Create the request from the supplied request factory
        $request = $this->requestFactory->createRequest($requestMethod, $requestPath);

        // Attach the Authorization header
        $request = $request->withHeader("Authorization", "key {$this->apiKey}");

        // Allow the rebrickable request to modify the RequestInterface before executing, to attach all
        // needed data
        $request = $rebrickableRequest->beforeRequest($request);

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
        $this->baseUrl = rtrim(string: $baseUrl, characters: "/");
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