<?php

namespace Model;

/**
 * Class Bus
 */
class Bus implements TransportInterface
{
    protected const NAME = 'Bus';
    protected const PASSENGER_CNT = 32;
    protected const CARGO_WEIGHT_MAX = 300;
    protected const FUEL_CONSUMPTION = 20;
    protected const TRAVEL_DISTANCE = 200;
    protected const DEPRECATION_RATE = 2;

    protected string $name;
    protected int $passengerCnt;
    protected float $cargoWeight;
    protected float $fuelConsumption;
    protected float $travelDistance;
    protected float $depreciationRate;
    protected FuelInterface $fuel;

    protected float $requiredFuelVolume;

    public function __construct(string $fuel = '')
    {
        $this
            ->setName(self::NAME)
            ->setPassengerCnt(self::PASSENGER_CNT)
            ->setCargoWeight(self::CARGO_WEIGHT_MAX)
            ->setFuelConsumption(self::FUEL_CONSUMPTION)
            ->setTravelDistance(self::TRAVEL_DISTANCE)
            ->setDepreciationRate(self::DEPRECATION_RATE)
            ->calculateRequiredFuelVolume()
        ;

        switch ($fuel) {
            default:

                $this->setFuel(new Benzine());
                break;
        }
    }

    public function setName(string $name): Bus
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setPassengerCnt(int $cnt): Bus
    {
        $this->passengerCnt = $cnt;

        return $this;
    }

    public function getPassengerCnt(): int
    {
        return $this->passengerCnt;
    }

    public function setCargoWeight(float $weight): Bus
    {
        $this->cargoWeight = $weight;

        return $this;
    }

    public function getCargoWeight(): float
    {
        return $this->cargoWeight;
    }

    public function setFuelConsumption(float $liter): Bus
    {
        $this->fuelConsumption = $liter;

        return $this;
    }

    public function getFuelConsumption(): float
    {
        return $this->fuelConsumption;
    }

    public function setTravelDistance(float $km): Bus
    {
        $this->travelDistance = $km;

        return $this;
    }

    public function getTravelDistance(): float
    {
        return $this->travelDistance;
    }

    public function setDepreciationRate(float $rate): Bus
    {
        $this->depreciationRate = $rate;

        return $this;
    }

    public function getDepreciationRate(): float
    {
        return $this->depreciationRate;
    }

    public function setFuel(FuelInterface $fuel): Bus
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getRequiredFuelVolume(): float
    {
        return $this->requiredFuelVolume;
    }

    public function calculateRequiredFuelVolume(): Bus
    {
        $this->requiredFuelVolume = $this->fuelConsumption / 100 * $this->travelDistance;

        return $this;
    }

    public function getTravelPrice(): float
    {
        $driver = new Driver();
        $driversSalary = $this->travelDistance * $driver->getCostPerKm() * $driver->getCategoryRatio();
        $travelCosts = $this->fuel->getPrice() * $this->getRequiredFuelVolume() * $this->getDepreciationRate();

        return $driversSalary + $travelCosts;
    }

    public function validatePassenger(int $passengerCnt): bool
    {
        return !($passengerCnt > self::PASSENGER_CNT);
    }

    public function validateCargoWeight(float $cargoWeight): bool
    {
        return !($cargoWeight > self::CARGO_WEIGHT_MAX);
    }

    public function validateTravelDistance(float $travelDistance): bool
    {
        return !($travelDistance > self::TRAVEL_DISTANCE);
    }
}
