<?php declare(strict_types=1);
namespace Zogot\Rebrickable\API\Client\Lego\Color\Entity;


class Color
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
     * @var string
     */
    protected string $rgb;

    /**
     * @var bool
     */
    protected bool $isTranslucent;

    /**
     * Color constructor.
     * @param int $id
     * @param string $name
     * @param string $rgb
     * @param bool $isTranslucent
     */
    public function __construct(int $id, string $name, string $rgb, bool $isTranslucent)
    {
        $this->id = $id;
        $this->name = $name;
        $this->rgb = $rgb;
        $this->isTranslucent = $isTranslucent;
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
     * @return string
     */
    public function getRGB(): string
    {
        return $this->rgb;
    }

    /**
     * @return bool
     */
    public function isTranslucent(): bool
    {
        return $this->isTranslucent;
    }
}