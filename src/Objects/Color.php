<?php

namespace App\Objects;

use Assert\Assertion;

class Color
{
    /**
     * @var int
     */
    private $red;
    /**
     * @var int
     */
    private $green;
    /**
     * @var int
     */
    private $blue;

    /**
     * @param int $red
     * @param int $green
     * @param int $blue
     * @return Color
     */
    public static function fromRgb(int $red, int $green, int $blue): Color
    {
        return new self($red, $green, $blue);
    }

    /**
     * Color constructor.
     * @param int $red
     * @param int $green
     * @param int $blue
     */
    private function __construct(int $red, int $green, int $blue)
    {
        Assertion::allBetween([$red, $green, $blue], 0, 255, 'Values must be between 0 and 255');
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    /**
     * @return int
     */
    public function getRed(): int
    {
        return $this->red;
    }

    /**
     * @return int
     */
    public function getGreen(): int
    {
        return $this->green;
    }

    /**
     * @return int
     */
    public function getBlue(): int
    {
        return $this->blue;
    }
}
