<?php declare(strict_types=1);
namespace Zogot\Rebrickable\API\Client\Lego\Set\Entity;

use DateTime;

class Set
{
    /**
     * @var string
     */
    protected string $setNumber;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var int
     */
    protected int $year;

    /**
     * @var int
     */
    protected int $themeId;

    /**
     * @var int
     */
    protected int $numberOfParts;

    /**
     * @var string
     */
    protected string $imageUrl;

    /**
     * @var string
     */
    protected string $url;

    /**
     * @var DateTime
     */
    protected DateTime $lastModified;

    /**
     * Set constructor.
     * @param string $setNumber
     * @param string $name
     * @param int $year
     * @param int $themeId
     * @param int $numberOfParts
     * @param string $imageUrl
     * @param string $url
     * @param DateTime $lastModified
     */
    public function __construct(
        string $setNumber,
        string $name,
        int $year,
        int $themeId,
        int $numberOfParts,
        string $imageUrl,
        string $url,
        DateTime $lastModified
    )
    {
        $this->setNumber = $setNumber;
        $this->name = $name;
        $this->year = $year;
        $this->themeId = $themeId;
        $this->numberOfParts = $numberOfParts;
        $this->imageUrl = $imageUrl;
        $this->url = $url;
        $this->lastModified = $lastModified;
    }

    /**
     * @return string
     */
    public function getSetNumber(): string
    {
        return $this->setNumber;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return int
     */
    public function getThemeId(): int
    {
        return $this->themeId;
    }

    /**
     * @return int
     */
    public function getNumberOfParts(): int
    {
        return $this->numberOfParts;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return DateTime
     */
    public function getLastModified(): DateTime
    {
        return $this->lastModified;
    }
}