<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Zogot\Rebrickable\API\Client\Lego\Color\Request\GetColors;
use Zogot\Rebrickable\API\Client\RebrickableRequestInterface;

class GetColorsTest extends TestCase
{
    protected GetColors $request;

    public function setUp(): void
    {
        $this->request = new GetColors();
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
        $this->assertEquals("/api/v3/lego/colors", $this->request->getPath());
    }

    public function testGetPathWithQueryArguments()
    {
        $request = new GetColors(page: 2, pageSize: 5, orderingField: "name");
        $this->assertEquals("/api/v3/lego/colors?page=2&page_size=5&ordering=name", $request->getPath());
    }

    public function testBeforeRequest()
    {
        $requestMock = $this->getMockBuilder(RequestInterface::class)
            ->getMock();

        $requestMock
            ->expects($this->once())
            ->method('withAddedHeader')
            ->with("Accept", "application/json")
            ->willReturn($requestMock);

        $this->request->beforeRequest($requestMock);
    }
}