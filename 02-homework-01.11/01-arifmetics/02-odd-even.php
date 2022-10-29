<?php
function checkOddEven(int $a):void{
    if ($a % 2===0){
        echo 'Even Number'. PHP_EOL;
    } else echo 'Odd Number'. PHP_EOL;
    echo 'Bye' . PHP_EOL;
}

$number = (int)readline("Enter number: ");
checkOddEven($number);
