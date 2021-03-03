<?php

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zogot\Rebrickable\API\Client\RebrickableRequestInterface;
use Zogot\Rebrickable\API\Client\RebrickableClient;

class RebrickableClientTest extends TestCase
{
    protected RebrickableClient $client;

    protected MockObject $psrClient;

    protected MockObject $requestFactory;

    public function setUp(): void
    {
        $this->psrClient = $this->getMockBuilder(ClientInterface::class)
            ->getMock();

        $this->requestFactory = $this->getMockBuilder(RequestFactoryInterface::class)
            ->getMock();

        $this->client = new RebrickableClient($this->psrClient, $this->requestFactory);
    }

    public function testSendRequest()
    {
        $rebrickableRequestMock = $this->getMockBuilder(RebrickableRequestInterface::class)
            ->getMock();

        $rebrickableRequestMock
            ->expects($this->once())
            ->method("getPath")
            ->willReturn("/api/v3/lego/colors/");

        $rebrickableRequestMock
            ->expects($this->once())
            ->method("getMethod")
            ->willReturn("GET");

        $requestMock = $this->getMockBuilder(RequestInterface::class)
            ->getMock();

        $responseMock = $this->getMockBuilder(ResponseInterface::class)
            ->getMock();

        $this->requestFactory
            ->expects($this->once())
            ->method("createRequest")
            ->with("GET", "https://rebrickable.com/api/v3/lego/colors/")
            ->willReturn($requestMock);

        $this->psrClient
            ->expects($this->once())
            ->method("sendRequest")
            ->willReturn($responseMock);

        $response = $this->client->send($rebrickableRequestMock);

        $this->assertInstanceOf(ResponseInterface::class, $response);

    }

    public function testChangingBaseUrl()
    {
        $rebrickableRequestMock = $this->getMockBuilder(RebrickableRequestInterface::class)
            ->getMock();

        $rebrickableRequestMock
            ->expects($this->once())
            ->method("getPath")
            ->willReturn("/api/v3/lego/colors/");

        $rebrickableRequestMock
            ->expects($this->once())
            ->method("getMethod")
            ->willReturn("GET");

        $requestMock = $this->getMockBuilder(RequestInterface::class)
            ->getMock();

        $responseMock = $this->getMockBuilder(ResponseInterface::class)
            ->getMock();

        $this->requestFactory
            ->expects($this->once())
            ->method("createRequest")
            ->with("GET", "https://rebrickabless.com/api/v3/lego/colors/")
            ->willReturn($requestMock);

        $this->psrClient
            ->expects($this->once())
            ->method("sendRequest")
            ->willReturn($responseMock);

        $r = $this->client->setBaseUrl("https://rebrickabless.com");
        $this->assertSame($r, $this->client);

        $response = $this->client->send($rebrickableRequestMock);
    }

    public function testTrimmingExtraSlashes()
    {
        $rebrickableRequestMock = $this->getMockBuilder(RebrickableRequestInterface::class)
            ->getMock();

        $rebrickableRequestMock
            ->expects($this->once())
            ->method("getPath")
            ->willReturn("/api/v3/lego/colors/");

        $rebrickableRequestMock
            ->expects($this->once())
            ->method("getMethod")
            ->willReturn("GET");

        $requestMock = $this->getMockBuilder(RequestInterface::class)
            ->getMock();

        $responseMock = $this->getMockBuilder(ResponseInterface::class)
            ->getMock();

        $this->requestFactory
            ->expects($this->once())
            ->method("createRequest")
            ->with("GET", "https://rebrickabless.com/api/v3/lego/colors/")
            ->willReturn($requestMock);

        $this->psrClient
            ->expects($this->once())
            ->method("sendRequest")
            ->willReturn($responseMock);

        $r = $this->client->setBaseUrl("https://rebrickabless.com/");
        $this->assertSame($r, $this->client);

        $response = $this->client->send($rebrickableRequestMock);
    }

    public function testEnsureBeforeRequestIsCalled()
    {
        $rebrickableRequestMock = $this->getMockBuilder(RebrickableRequestInterface::class)
            ->getMock();

        $rebrickableRequestMock
            ->expects($this->once())
            ->method("getPath")
            ->willReturn("/api/v3/lego/colors/");

        $rebrickableRequestMock
            ->expects($this->once())
            ->method("getMethod")
            ->willReturn("GET");

        $requestMock = $this->getMockBuilder(RequestInterface::class)
            ->getMock();

        $rebrickableRequestMock
            ->expects($this->once())
            ->method("beforeRequest")
            ->with($requestMock)
            ->willReturn($requestMock);

        $responseMock = $this->getMockBuilder(ResponseInterface::class)
            ->getMock();

        $this->requestFactory
            ->expects($this->once())
            ->method("createRequest")
            ->with("GET", "https://rebrickable.com/api/v3/lego/colors/")
            ->willReturn($requestMock);

        $this->psrClient
            ->expects($this->once())
            ->method("sendRequest")
            ->willReturn($responseMock);

        $this->client->send($rebrickableRequestMock);
    }
}