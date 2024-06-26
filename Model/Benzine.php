<?php

namespace Model;

/**
 * Class Benzine
 */
class Benzine implements FuelInterface
{
    protected const NAME = 'Benzine';
    protected const PRICE = 70;

    protected string $name;
    protected float $price;

    public function __construct()
    {
        $this
            ->setName(self::NAME)
            ->setPrice(self::PRICE)
        ;
    }

    public function setName(string $name): Benzine
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setPrice(float $price): Benzine
    {
        $this->price = $price;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
