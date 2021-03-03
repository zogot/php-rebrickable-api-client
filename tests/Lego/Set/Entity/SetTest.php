<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zogot\Rebrickable\API\Client\Lego\Set\Entity\Set;

class SetTest extends TestCase
{
    protected Set $set;

    public function setUp(): void
    {
        $this->set = new Set("001-1", "Gears", 1965, 1, 43, "https://cdn.rebrickable.com/media/sets/001-1/11530.jpg", "https://rebrickable.com/sets/001-1/gears/", new DateTime("2018-05-06T11:34:38.029101Z"));
    }

    public function testGetSetNumber()
    {
        $this->assertEquals("001-1", $this->set->getSetNumber());
    }

    public function testGetName()
    {
        $this->assertEquals("Gears", $this->set->getName());
    }

    public function testGetYear()
    {
        $this->assertEquals(1965, $this->set->getYear());
    }

    public function testGetThemeId()
    {
        $this->assertEquals(1, $this->set->getThemeId());
    }

    public function testGetNumberOfParts()
    {
        $this->assertEquals(43, $this->set->getNumberOfParts());
    }

    public function testGetImageURL()
    {
        $this->assertEquals("https://cdn.rebrickable.com/media/sets/001-1/11530.jpg", $this->set->getImageUrl());
    }

    public function testGetURL()
    {
        $this->assertEquals("https://rebrickable.com/sets/001-1/gears/", $this->set->getUrl());
    }

    public function testGetLastModified()
    {
        $this->assertInstanceOf(DateTime::class, $lm = $this->set->getLastModified());
        $this->assertEquals("2018-05-06T11:34:38.029101Z", $lm->format("Y-m-d\TH:i:s.u\Z"));
    }
}