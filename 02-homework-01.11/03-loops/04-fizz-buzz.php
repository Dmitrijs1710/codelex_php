<?php
    $max = (int)readline('Max value? ');
    for ($i = 1 ; $i <= $max; $i++){
        $result = '';
        if ($i % 3 === 0){
            $result.= 'Fizz';
        }
        if ($i % 5 === 0){
            $result.='Buzz';
        }
        if($result === ''){
            echo $i;
        } else echo $result;
        if ($i % 20 === 0){
            echo PHP_EOL;
        } else echo ' ';
    }