<?php
    $toMax=(int)readline('Input how many numbers to display: ');
    $numbersNatural = [];
    for($i=1;$i<=$toMax;$i++){
        $numbersNatural[] = $i;
    }
    echo "The first $toMax natural numbers are: " . implode( ' ', $numbersNatural) .PHP_EOL;