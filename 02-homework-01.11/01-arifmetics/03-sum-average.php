<?php
    $lowerNumber = (int)readline('Enter lower number: ');
    $upperNumber = (int)readline('Enter upper number: ');

    if ($lowerNumber>$upperNumber){
        echo 'lower number is bigger than upper' .PHP_EOL;
        echo 'shutdown. restart the program' . PHP_EOL;
        exit;
    }

    function sumUp(int $start, int $stop) :int{
        $result=$start;
        for ($i = $start+1; $i<=$stop; $i++){
            $result+=$i;
        }
        return $result;
    }

    function average(int $lower, int $upper) : float{
        return(sumUp($lower,$upper) / ($upper-$lower+1));
    }




    echo "the sum of $lowerNumber to $upperNumber is " . sumUp($lowerNumber,$upperNumber) . PHP_EOL;
    echo "the average is " . average($lowerNumber,$upperNumber) . PHP_EOL;