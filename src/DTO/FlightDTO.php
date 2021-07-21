<?php
namespace App\DTO;

use App\Classes\Flight;

class FlightDTO
{
    public $departure;
    public $airline;

    public function __construct(Flight $flight)
    {
        $this->departure = $flight->getDeparture();
        $this->airline = $flight->getAirline();

    }
    public static function createFromValues(Flight $flight): FlightDTO
    {
        return new self($flight);
    }

    /**
     * @return mixed
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @return mixed
     */
    public function getAirline()
    {
        return $this->airline;
    }
}
