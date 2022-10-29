<?php
    $numbersNatural = [];
    for($i=1;$i<=10;$i++){
        $numbersNatural[] = $i;
    }
    echo "The first 10 natural numbers are: " . implode( ' ', $numbersNatural) .PHP_EOL;