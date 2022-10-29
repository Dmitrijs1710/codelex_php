<?php
    $number = (int) readline('Enter a number: ');
    if ($number<1){
        echo 'number is lower than 1' . PHP_EOL;
        exit;
    }

    $result=1;
    for($i=2;$i<=$number;$i++){
        $result*=$i;
    }

    echo "factorial of number $number is $result" . PHP_EOL;
