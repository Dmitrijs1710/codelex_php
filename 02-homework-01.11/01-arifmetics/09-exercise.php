<?php
    function calculateBmi (float $weight,float $height) :float{
        return $weight *703 / pow($height,2);
    }
    $weight = (float)readline('Input weight in pounds ');
    $height = (float)readline('Input weight in Inches ');

    $personBmi = calculateBmi($weight, $height);

    echo 'Your BMI is ' . $personBmi . PHP_EOL;

    if ($personBmi<18.5){
        echo 'underweight' . PHP_EOL;
    } else if ($personBmi>25){
        echo 'overweight' . PHP_EOL;
    } else echo 'optimal' . PHP_EOL;