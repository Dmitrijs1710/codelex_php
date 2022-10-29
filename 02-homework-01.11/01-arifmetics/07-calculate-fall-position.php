<?php
    $xStartPosition = (int)readline('input start position: ');
    $seconds = (int)readline('input seconds: ');

    function calculatePosition(int $time, ?int $startPosition = 0) :float {
        $a = -9.81;
        $velocity = 0;
        return $startPosition+($velocity*$time)+(0.5*$a*pow($time,2));
    }
    echo calculatePosition($seconds, $xStartPosition) . PHP_EOL;
