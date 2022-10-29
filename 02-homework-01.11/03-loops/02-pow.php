<?php
    $i = (int)readline('Input initial number: ');
    $n = (int)readline('Input number of terms: ');
    $result = $i;
    for($g = 1;$g<=$n;$g++){
        $result*=$i;
    }
    echo "Result: $result\n";
