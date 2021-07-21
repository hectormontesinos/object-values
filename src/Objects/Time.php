<?php
namespace App\Objects;

final class Time
{
    private $hours;
    private $minutes;

    private function __construct($hours, $minutes)
    {
        $this->hours = (int)$hours;
        $this->minutes = (int)$minutes;
    }

    public static function fromValues($hours, $minutes): Time
    {
        return new self($hours, $minutes);
    }

    public function getHours(): int
    {
        return $this->hours;
    }

    public function getMinutes(): int
    {
        return $this->minutes;
    }
}
