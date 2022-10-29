<?php
    $numbers = [2,4,5,6,8,1,23,45,3,9];
    for ($i = 0; $i<count($numbers);$i++){
        if ($numbers[$i]%3 === 0){
            echo $numbers[$i] . PHP_EOL;
        }
    }
