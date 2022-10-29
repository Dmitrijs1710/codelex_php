<?php
$persons = [
    [
        'name' => 'Dmitrijs',
        'surname' => 'Fofanovs',
        'age' => 30
    ],
    [
        'name' => 'Dmitrijs',
        'surname' => 'Bogdanovs',
        'age' => 17
    ],
    [
        'name' => 'Antons',
        'surname' => 'Fofanovs',
        'age' => 30
    ]
];

function determineAge($humans){
    for ($i = 0; $i<count($humans); $i++){
        if ($humans[$i]['age']>=18){
            echo $humans[$i]['name'] . ' ' . $humans[$i]['surname'] . ' is old enough';
        } else echo $humans[$i]['name'] . ' ' . $humans[$i]['surname'] . ' is not old enough';
        echo PHP_EOL;
    }

}

determineAge($persons);
