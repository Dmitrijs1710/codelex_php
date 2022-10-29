<?php
    $elements = [3, 2, 5, 5.7, 'Hello World'];
    $elements2 = [];

    function doubleUp($element) {
        if (gettype($element) === 'integer' || gettype($element) === 'double'){
            return $element*2;
        } else return $element;
    }
    function printOut($arr){
        for ($i = 0; $i<count($arr);$i++){
            echo ($arr[$i]). ' ';
        }
        echo PHP_EOL;
    }

    printOut($elements);

    for ($i = 0; $i<count($elements); $i++){
        $elements2[$i] = doubleUp($elements[$i]);
    }

    printOut($elements2);

