<?php

interface CarService
{
    public function getCost(): int;

    public function getDescription(): string;
}

class BasicInspection implements CarService
{
    public function getCost(): int
    {
        return 19;
    }

    public function getDescription(): string
    {
        return 'Basic inspection';
    }
}

class OilChange implements CarService
{

    protected CarService $carService;

    /**
     * OilChange constructor.
     * @param $carService
     */
    public function __construct($carService)
    {
        $this->carService = $carService;
    }

    public function getCost(): int
    {
        return 19 + $this->carService->getCost();
    }

    public function getDescription(): string
    {
        return $this->carService->getDescription() . ', and oil change';
    }
}

class TireRotation implements CarService
{

    protected CarService $carService;

    /**
     * OilChange constructor.
     * @param $carService
     */
    public function __construct($carService)
    {
        $this->carService = $carService;
    }

    public function getCost(): int
    {
        return 15 + $this->carService->getCost();
    }

    public function getDescription(): string
    {
        return $this->carService->getDescription() . ', and tire rotation';
    }
}

$carService = new TireRotation(new OilChange(new BasicInspection()));

echo ($carService)->getCost();
echo ($carService)->getDescription();