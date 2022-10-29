<?php
    $number = 75;
    switch (true){
        case $number < 50 :
            echo 'low' . PHP_EOL;
            break;
        case $number > 100 :
            echo 'High' . PHP_EOL;
            break;
        default :
            echo 'medium' .PHP_EOL;
            break;

    }
