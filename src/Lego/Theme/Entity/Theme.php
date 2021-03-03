<?php declare(strict_types=1);
namespace Zogot\Rebrickable\API\Client\Lego\Theme\Entity;

class Theme
{
    /**
     * @var int
     */
    protected int $id;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var Theme[]
     */
    protected array $children = [];

    /**
     * Theme constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Theme $theme
     * @return $this
     */
    public function addChildren(Theme $theme): self
    {
        $this->children[] = $theme;
        return $this;
    }

    /**
     * @return Theme[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }
}