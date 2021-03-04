<?php declare(strict_types=1);
namespace Zogot\Rebrickable\API\Client\Lego\Color\Request;

use Psr\Http\Message\RequestInterface;
use Zogot\Rebrickable\API\Client\RebrickableRequestInterface;
use function implode;

class GetColors implements RebrickableRequestInterface
{
    /**
     * @var int|null
     */
    protected ?int $page;

    /**
     * @var int|null
     */
    protected ?int $pageSize;

    /**
     * @var string|null
     */
    protected ?string $orderingField;

    /**
     * GetColors constructor.
     * @param int|null $page
     * @param int|null $pageSize
     * @param string|null $orderingField
     */
    public function __construct(?int $page = null, ?int $pageSize = null, ?string $orderingField = null)
    {
        $this->page = $page;
        $this->pageSize = $pageSize;
        $this->orderingField = $orderingField;
    }

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
        $path = "/api/v3/lego/colors/";

        $queryParameters = [];

        if(!is_null($this->page)) {
            $queryParameters[] = "page={$this->page}";
        }

        if(!is_null($this->pageSize)) {
            $queryParameters[] = "page_size={$this->pageSize}";
        }

        if(!is_null($this->orderingField)) {
            $queryParameters[] = "ordering={$this->orderingField}";
        }

        if(!empty($queryParameters)) {
            return $path . "?" . implode(separator: "&", array: $queryParameters);
        }

        return $path;
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