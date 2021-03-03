<?php

use PHPUnit\Framework\TestCase;
use Zogot\Rebrickable\API\Client\Lego\Theme\Entity\Theme;

class ThemeTest extends TestCase
{
    protected Theme $theme;

    public function setUp(): void
    {
        $this->theme = new Theme(1, "Star Wars");
    }

    public function testGetID()
    {
        $this->assertEquals(1, $this->theme->getID());
    }

    public function testAddChildren()
    {
        $theme2 = new Theme(2, "Blep");
        $resp = $this->theme->addChildren($theme2);
        $this->assertSame($this->theme, $resp);
    }

    public function testGetChildren()
    {
        $this->assertEquals([], $this->theme->getChildren());

        $theme2 = new Theme(2, "Bleep");
        $this->theme->addChildren($theme2);

        $this->assertEquals([$theme2], $this->theme->getChildren());

        $this->theme->addChildren($theme3 = new Theme(3, "Bloop"));
        $this->assertEquals([$theme2, $theme3], $this->theme->getChildren());
    }

    public function testGetName()
    {
        $this->assertEquals("Star Wars", $this->theme->getName());
    }
}