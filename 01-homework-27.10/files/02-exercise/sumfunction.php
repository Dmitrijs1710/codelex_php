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

    function sum($a,$b){
        if ((gettype($a)==='integer' || gettype($a)==='double' ) && (gettype($b)==='integer' || gettype($b)==='double' )){
            $a += $b;
            return $a;
        } else return 'string is not a valid argument';
    }
