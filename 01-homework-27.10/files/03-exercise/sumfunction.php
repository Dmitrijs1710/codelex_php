<?php include 'sumupfunction.php';

    function sum($a,$b){
        if ((gettype($a)==='integer' || gettype($a)==='double' ) && (gettype($b)==='integer' || gettype($b)==='double' )){
            $a += $b;
            return $a;
        } else return 'string is not a valid argument';
    }
