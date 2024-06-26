<?php

spl_autoload_register();

$passengerCnt = $_SERVER['argv'][1] ?? null;
$cargoWeight = $_SERVER['argv'][2] ?? null;
$travelDistance = $_SERVER['argv'][3] ?? null;

if (!$passengerCnt || !$cargoWeight || !$travelDistance) {
    write('empty parameter(s).');
    die;
}

calculate($passengerCnt, $cargoWeight, $travelDistance);

function calculate(int $passengerCnt, float $cargoWeight, float $travelDistance): void
{
    $bus = new \Model\Bus();

    $errorValidation = false;
    if (!$bus->validatePassenger($passengerCnt)) {
        $errorValidation = true;
        write('the number of passengers is too large.');
    }
    if (!$bus->validateCargoWeight($cargoWeight)) {
        $errorValidation = true;
        write('the amount of luggage is too much.');
    }
    if (!$bus->validateTravelDistance($travelDistance)) {
        $errorValidation = true;
        write('too long distance.');
    }

    if ($errorValidation) {
        die;
    }

    $bus
        ->setPassengerCnt($passengerCnt)
        ->setCargoWeight($cargoWeight)
        ->setTravelDistance($travelDistance)
        ->calculateRequiredFuelVolume()
    ;

    $price = $bus->getTravelPrice();

    write();
    write("total price: {$price}");
    write();
    write('cost per passenger: ' . ($price / $passengerCnt));
}

function write($message = ''): void
{
    echo date('Y-m-d [H:i:s]') . " {$message}\n";
}
