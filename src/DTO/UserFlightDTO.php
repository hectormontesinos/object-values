<?php
namespace App\DTO;

use App\Classes\Flight;
use App\Classes\User;

class UserFlightDTO
{
    private $user_name;
    private $departure;
    private $airline;

    /**
     * UserFlightDTO constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param string $user_name
     */
    public function setUserName(string $user_name): void
    {
        $this->user_name = $user_name;
    }

    /**
     * @param string $departure
     */
    public function setDeparture(string $departure): void
    {
        $this->departure = $departure;
    }

    /**
     * @param string $airline
     */
    public function setAirline(string $airline): void
    {
        $this->airline = $airline;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
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
