<?php
$person = [
    'name' => 'Dmitrijs',
    'surname' => 'Fofanovs',
    'age' => 30
];

function determineAge($human){
    if ($human['age']>=18){
        echo 'legit';
    } else echo 'grow up';
    echo PHP_EOL;
}

determineAge($person);
