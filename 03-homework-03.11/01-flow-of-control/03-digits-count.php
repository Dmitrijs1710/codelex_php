<?php
    $pattern='/^\d+$/';
    while (true){
        $num1 = readline('Enter digit: ');
        if(preg_match($pattern,$num1)){
            break;
        } else echo "Invalid input. must be a positive integer\n";
    }
    echo "number of digits is " . strlen($num1) .PHP_EOL;