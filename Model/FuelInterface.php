<?php

namespace Model;

/**
 * Interface FuelInterface
 */
interface FuelInterface
{
    public function setName(string $name);

    public function getName(): string;

    public function setPrice(float $price);

    public function getPrice(): float;
}
