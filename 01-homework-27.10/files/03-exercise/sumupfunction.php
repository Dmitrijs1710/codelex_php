<?php
    function sumUp(...$numbers){
    $result = 0;
    foreach ($numbers as $value){
        if (gettype($value)==='integer' || gettype($value)==='double' ){
            $result += $value;
        } else return 'string is not a valid argument';
    }
    return $result;
}
