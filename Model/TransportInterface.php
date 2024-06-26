<?php

namespace Model;

/**
 * Interface TransportInterface
 */
interface TransportInterface
{
    public function setName(string $name);

    public function getName(): string;

    public function setPassengerCnt(int $cnt);

    public function getPassengerCnt(): int;

    public function setCargoWeight(float $weight);

    public function getCargoWeight(): float;

    public function setFuelConsumption(float $liter);

    public function getFuelConsumption(): float;

    public function setTravelDistance(float $km);

    public function getTravelDistance(): float;

    public function setDepreciationRate(float $rate);

    public function getDepreciationRate(): float;
}
