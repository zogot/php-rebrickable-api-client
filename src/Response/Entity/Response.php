<?php declare(strict_types=1);
namespace Zogot\Rebrickable\API\Client\Response\Entity;

class Response
{
    public function __construct(
        protected int $count,
        protected string|null $nextUrl,
        protected string|null $previousUrl,
    ) {}

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return string|null
     */
    public function getNextUrl(): string|null
    {
        return $this->nextUrl;
    }

    /**
     * @return string|null
     */
    public function getPreviousUrl(): string|null
    {
        return $this->previousUrl;
    }
}