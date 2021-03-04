<?php declare(strict_types=1);
namespace Zogot\Rebrickable\API\Client\Lego\Color\Request;

use Psr\Http\Message\RequestInterface;
use Zogot\Rebrickable\API\Client\RebrickableRequestInterface;

class GetColorsById implements RebrickableRequestInterface
{
    public function __construct(
        protected int $id
    ) {}

    /**
     * Return the http method for this request.
     *
     * @return string
     */
    public function getMethod(): string
    {
        return RebrickableRequestInterface::METHOD_GET;
    }

    /**
     * Return the api endpoints path.
     *
     * @see https://rebrickable.com/api/v3/docs/
     * @return string
     */
    public function getPath(): string
    {
        return "/api/v3/lego/colors/{$this->id}/";
    }

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
    public function beforeRequest(RequestInterface $request): RequestInterface
    {
        return $request->withAddedHeader("Accept", "application/json");
    }
}