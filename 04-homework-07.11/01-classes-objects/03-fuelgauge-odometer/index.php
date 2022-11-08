<?php
include 'Odometer.php';

$car = new Odometer(999980,5);
for($i=0;$i<56;$i++)
{
    $car->incMileage();
    echo ($car->getMileage() . PHP_EOL);
    echo $car->getFuelAmountLiters();
    echo PHP_EOL;
}
for($i=0;$i<20;$i++){
    $car->incFuelAmountBy1();
    echo ($car->getMileage() . PHP_EOL);
    echo $car->getFuelAmountLiters();
    echo PHP_EOL;
}
for($i=0;$i<5;$i++){
    $car->incMileage();
    echo ($car->getMileage() . PHP_EOL);
    echo $car->getFuelAmountLiters();
    echo PHP_EOL;
}