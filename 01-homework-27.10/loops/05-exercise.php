<?php
    $persons = [
        [
            'name' => 'Dmitrijs',
            'surname' => 'Fofanovs',
            'age' => 30,
            'birthday' => '17.10.1992'
        ],
        [
            'name' => 'Antons',
            'surname' => 'Gavrilovs',
            'age' => 28,
            'birthday' => '28.02.1994'
        ],
        [
            'name' => 'Ilana',
            'surname' => 'Stanuleene',
            'age' => 24,
            'birthday' => '26.10.1998'
        ]
    ];
    for ($i = 0; $i<count($persons);$i++){
        echo $persons[$i]['name'] . $persons[$i]['surname'] . $persons[$i]['age'] . $persons[$i]['birthday'] . PHP_EOL;
    }
