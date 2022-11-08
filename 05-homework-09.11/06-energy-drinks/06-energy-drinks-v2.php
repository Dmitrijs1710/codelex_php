<?php
class EnergyDrinks{
    private int $surveyed ;
    private float $purchased_energy_drinks;
    private float $prefer_citrus_drinks;

    public function __construct(int $surveyed = 12467,float $purchased_energy_drinks = 0.14,float $prefer_citrus_drinks = 0.64)
    {
        $this->surveyed = $surveyed;
        $this->prefer_citrus_drinks = $prefer_citrus_drinks;
        $this->purchased_energy_drinks = $purchased_energy_drinks;
    }

    public function calculate_energy_drinkers() :int
    {
        return round($this->surveyed*$this->purchased_energy_drinks);
    }

    public function calculate_prefer_citrus() :int
    {
        return round($this->surveyed*$this->purchased_energy_drinks*$this->prefer_citrus_drinks);
    }

    /**
     * @return int
     */
    public function getSurveyed(): int
    {
        return $this->surveyed;
    }
}
$energyDrinks = new EnergyDrinks();
echo "Total number of people surveyed " . $energyDrinks->getSurveyed() . PHP_EOL;
echo "Approximately " . $energyDrinks->calculate_energy_drinkers() . " bought at least one energy drink\n";
echo $energyDrinks->calculate_prefer_citrus() . " of those " . "prefer citrus flavored energy drinks.\n";

