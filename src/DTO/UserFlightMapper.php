<?php
namespace App\DTO;

use App\Classes\User;
use App\Classes\Flight;

class UserFlightMapper
{
    public static function createDTO(User $user, Flight $flight) : UserFlightDTO
    {
        $userDto = UserDTO::createFromValues($user);
        $flightDto = FlightDTO::createFromValues($flight);
        $userFlightDto = new UserFlightDTO();
        $userFlightDto->setAirline($flightDto->getAirline());
        $userFlightDto->setDeparture($flightDto->getDeparture());
        $userFlightDto->setUserName($userDto->getName());
        $userFlightDto->setDeparture($userDto->getLastName());
        return $userFlightDto;
    }
}
