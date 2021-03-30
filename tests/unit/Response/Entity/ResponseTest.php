<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zogot\Rebrickable\API\Client\Response\Entity\Response;

class ResponseTest extends TestCase
{
    protected Response $response;

    protected int $count;

    protected string $next;

    protected string $previous;

    protected function setUp(): void
    {
        $this->count = $count = mt_rand(min: 1, max: 999);
        $count = $count - 1;
        $this->next = "https://rebrickable.com/api/v3/lego/colors/?page={$this->count}";
        $this->previous = "https://rebrickable.com/api/v3/lego/colors/?page={$count}";
        $this->response = new Response($this->count, $this->next, $this->previous);
    }

    public function testGetCount()
    {
        $this->assertEquals($this->count, $this->response->getCount());
    }

    public function testGetNextUrl()
    {
        $this->assertEquals($this->next, $this->response->getNextUrl());
    }

    public function testGetPreviousUrl()
    {
        $this->assertEquals($this->previous, $this->response->getPreviousUrl());
    }

    public function testGetNextUrlIsNull()
    {
        $response = new Response($this->count, null, $this->previous);
        $this->assertEquals(null, $response->getNextUrl());
    }

    public function testGetPreviousIsNull()
    {
        $response = new Response($this->count, $this->next, null);
        $this->assertEquals(null, $response->getPreviousUrl());
    }

    public function testGetResults()
    {

    }
}