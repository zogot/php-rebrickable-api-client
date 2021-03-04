<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Zogot\Rebrickable\API\Client\Lego\Color\Request\GetColorsById;
use Zogot\Rebrickable\API\Client\RebrickableRequestInterface;

class GetColorsByIdTest extends TestCase
{
    protected GetColorsById $request;

    protected int $randomId;

    public function setUp(): void
    {
        $this->randomId = mt_rand(min: 1, max: 99);
        $this->request = new GetColorsById($this->randomId);
    }

    public function testImplements()
    {
        $this->assertInstanceOf(RebrickableRequestInterface::class, $this->request);
    }

    public function testGetMethod()
    {
        $this->assertEquals("GET", $this->request->getMethod());
    }

    public function testGetPath()
    {
        $this->assertEquals("/api/v3/lego/colors/{$this->randomId}/", $this->request->getPath());
    }

    public function testBeforeRequest()
    {
        $requestMock = $this->getMockBuilder(RequestInterface::class)
            ->getMock();

        $requestMock
            ->expects($this->once())
            ->method("withAddedHeader")
            ->with("Accept", "application/json")
            ->willReturn($requestMock);

        $this->request->beforeRequest($requestMock);
    }
}