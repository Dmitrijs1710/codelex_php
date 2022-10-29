<?php
    $a = (int)readline("Enter number 'a' :");
    $b = (int)readline("Enter number 'b' :");

    if($a+$b===15 || $a-$b===15 || $b-$a===15 || $a===15 || $b===15){
        echo 'true'.PHP_EOL;
    } else echo 'false'.PHP_EOL;