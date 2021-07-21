<?php

require 'vendor/autoload.php';

use App\DTO\UserFlightMapper;
use App\Objects\Price;
use App\Classes\Flight;
use App\Classes\User;
use App\DTO\UserFlightDTO;

$price = Price::createPriceInDollars('10.5');


$user = new User([
    'name' => 'ID90',
    'last_name' => 'Travel',
    'idUsuario' => 321,
    'password' => md5('123456')
]);

$flight = new Flight([
    'id' => 1000000001,
    'departure' => '2022-10-10',
    'airline' => 'HA',
    'airline_id' => 238
]);

//----------------------------------------------
// /api/v1/user/321/flight/987
//$dto = new UserFlightDTO();
//
//$dto->setAirline($flight->getAirline());
//$dto->setDeparture($flight->getDeparture());
//$dto->setUserName($user->getName());
//
//print_r($dto);
//$dataStr = serialize($dto);
//print_r(\json_encode(['data' => $dto]));
//print_r(unserialize($dataStr));

//$response = UserFlightMapper::createDTO($user, $flight);
//
//print_r($response);
