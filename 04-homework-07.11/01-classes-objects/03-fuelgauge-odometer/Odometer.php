<?php
include 'FuelGauge.php';
class Odometer extends FuelGauge
{
    public int $mileage;
    protected int $gasConsumption;

    public function __construct(int $mileage, int $fuelAmountLiters = 0)
    {
        parent::__construct($fuelAmountLiters);
        $this->mileage = $mileage;
        $this->gasConsumption = 10;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function incMileage(): void
    {
        if ($this->fuelAmountLiters > 0) {
            if ($this->mileage === 999999) {
                $this->mileage = 0;
            } else $this->mileage++;
            if ($this->gasConsumption === 0) {
                $this->decFuelAmountBy1();
                $this->gasConsumption = 10;
            } else $this->gasConsumption--;
        }
    }

}
