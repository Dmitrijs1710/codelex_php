<?php
    $xStartPosition = (int)readline('input start position: ');
    $seconds = (int)readline('input seconds: ');
    $velocity = (int)readline('input initial velocity');
    $a = (int)readline('input acceleration');
    function calculatePosition(int $startPosition = 0, int $time = 10, int $initialVelocity = 0, float $a = -9.81 ) :float {
        return $startPosition+($initialVelocity*$time)+(0.5*$a*pow($time,2));
    }
    echo 'default parameters: ' . calculatePosition() . PHP_EOL;
    echo 'user choice parameters :' . calculatePosition($xStartPosition,$seconds,$velocity,$a) .PHP_EOL;