<?php declare(strict_types=1);
namespace Zogot\Rebrickable\API\Client\Common\Request;

use Psr\Http\Message\RequestInterface;

interface RebrickableRequestInterface
{
    const METHOD_GET = "GET";
    const METHOD_POST = "POST";
    const METHOD_PUT = "PUT";
    const METHOD_PATCH = "PATCH";
    const METHOD_DELETE = "DELETE";

    /**
     * Return the http method for this request.
     *
     * @return string
     */
    public function getMethod(): string;

    /**
     * Return the api endpoints path.
     *
     * @see https://rebrickable.com/api/v3/docs/
     * @return string
     */
    public function getPath(): string;

    /**
     * Modify the outgoing request, mainly used for adding additional headers or
     * body of the outgoing request.
     *
     * Return the Request in the end, in case the implementation of RequestInterface
     * is immutable.
     *
     * @param RequestInterface $request
     * @return RequestInterface
     */
    public function beforeRequest(RequestInterface $request): RequestInterface;
}