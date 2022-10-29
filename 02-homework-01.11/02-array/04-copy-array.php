<?php
    $a = [];
    for($i=0;$i<10;$i++){
        $a[] = rand(1,100);
    }
    // $b = $a; don't know if this is the right way, but it works too.
    $b = [];
    foreach ($a as $element){
       $b[] = $element;
    }

    $a[count($a)-1]=-7;

    echo "array 1: " . (implode(' ',$a)) . PHP_EOL;
    echo "array 2: " . (implode(' ',$b)) . PHP_EOL;