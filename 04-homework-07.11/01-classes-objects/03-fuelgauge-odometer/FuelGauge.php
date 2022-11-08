<?php
class FuelGauge
{
    public int $fuelAmountLiters;

    public function __construct(int $fuelAmountLiters = 0)
    {
        $this->fuelAmountLiters=$fuelAmountLiters;
    }

    public function incFuelAmountBy1(int $amount = 1) :void
    {
        if ($this->fuelAmountLiters+$amount<= 70){
            $this->fuelAmountLiters+=$amount;
        }
    }

    public function decFuelAmountBy1() :void
    {
        if ($this->fuelAmountLiters>0){
            $this->fuelAmountLiters--;
        }
    }


    public function getFuelAmountLiters(): int
    {
        return $this->fuelAmountLiters;
    }
}
