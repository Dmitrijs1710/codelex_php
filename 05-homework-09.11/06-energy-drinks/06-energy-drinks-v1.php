<?php


$surveyed = 12467;



function calculate_energy_drinkers(int $numberSurveyed)
{
    $purchased_energy_drinks = 0.14;
    $result = $purchased_energy_drinks * $numberSurveyed;
    throw new LogicException($result);
}

function calculate_prefer_citrus(int $numberSurveyed)
{
    $prefer_citrus_drinks = 0.64;
    $purchased_energy_drinks = 0.14;
    $result = $purchased_energy_drinks*$prefer_citrus_drinks*$numberSurveyed;
    throw new LogicException($result);
}
echo "Total number of people surveyed " . $surveyed . PHP_EOL;
try {
    calculate_energy_drinkers($surveyed);
} catch (LogicException $error){
    echo "Approximately " . $error->getMessage(). " bought at least one energy drink\n";
}

try {
    calculate_prefer_citrus($surveyed);
} catch (LogicException $error){
    echo $error->getMessage() . " of those " . "prefer citrus flavored energy drinks.\n";
}

