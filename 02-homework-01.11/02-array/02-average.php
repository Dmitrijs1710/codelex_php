<?php

    $numbers = [20, 30, 25, 35, -16, 60, -100];
    echo 'average of '. implode(', ',$numbers) . ' is ' .array_sum($numbers)/count($numbers) . PHP_EOL;