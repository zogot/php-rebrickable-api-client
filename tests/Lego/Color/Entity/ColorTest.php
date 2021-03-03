<?php

use PHPUnit\Framework\TestCase;
use Zogot\Rebrickable\API\Client\Lego\Color\Entity\Color;

class ColorTest extends TestCase
{
    protected Color $color;

    public function setUp(): void
    {
        $this->color = new Color(2, "Green", "237841", false);
    }

    public function testGetId()
    {
        $this->assertEquals(2, $this->color->getID());
    }

    public function testGetName()
    {
        $this->assertEquals("Green", $this->color->getName());
    }

    public function testGetRgb()
    {
        $this->assertEquals("237841", $this->color->getRGB());
    }

    public function testIsTranslucent()
    {
        $this->assertEquals(false, $this->color->isTranslucent());
    }
}