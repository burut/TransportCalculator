<?php

namespace Model;

/**
 * Interface DriverInterface
 */
interface DriverInterface
{
    public function setCostPerKm(float $cost);

    public function getCostPerKm(): float;

    public function setCategoryRatio(float $ratio);

    public function getCategoryRatio(): float;
}
