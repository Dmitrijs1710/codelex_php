<?php
    echo "Input the 1st number: ";
    $num1 = (int)readline();
    echo "Input the 2nd number: ";
    $num2 = (int)readline();
    echo "Input the 3rd number: ";
    $num3 = (int)readline();

    $max=max($num3, $num1, $num2);
    echo $max . PHP_EOL;