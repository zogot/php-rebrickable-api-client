<?php declare(strict_types=1);
namespace Zogot\Rebrickable\API\Client\Common\Request;

interface RebrickableRequestInterface
{
    public function getMethod(): string;

    public function getPath(): string;

    public function getParameters(): array;
}