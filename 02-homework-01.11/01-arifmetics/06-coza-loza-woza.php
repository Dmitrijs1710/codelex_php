<?php
    $end = (int) readline("enter end number: ");

    for($i=1;$i<=$end; $i++){
        $str = '';
        if($i % 3===0) $str.="Coza";
        if($i % 5===0) $str.="Loza";
        if($i % 7===0) $str.="Woza";
        if($str === '') {
            echo $i;
        } else echo $str;
        if($i % 11 === 0){
            echo PHP_EOL;
        } else echo ' ';
    }
    echo PHP_EOL;
