<?php

namespace Model;

/**
 * Class Benzine
 */
class Driver implements DriverInterface
{
    protected const CATEGORY_RATIO = 1.5;
    protected const COST_PER_KM = 25;

    protected float $costPerKm;
    protected float $categoryRatio;

    public function __construct()
    {
        $this
            ->setCostPerKm(self::CATEGORY_RATIO)
            ->setCategoryRatio(self::COST_PER_KM)
        ;
    }

    public function setCostPerKm(float $cost): Driver
    {
        $this->costPerKm = $cost;

        return $this;
    }

    public function getCostPerKm(): float
    {
        return $this->costPerKm;
    }

    public function setCategoryRatio(float $ratio): Driver
    {
        $this->categoryRatio = $ratio;

        return $this;
    }

    public function getCategoryRatio(): float
    {
        return $this->categoryRatio;
    }
}
