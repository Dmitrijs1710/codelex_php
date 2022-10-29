<?php
    $numbers = [
        1789, 2035, 1899, 1456, 2013,
        1458, 2458, 1254, 1472, 2365,
        1456, 2165, 1457, 2456
    ];



    echo "Original numeric array: " . implode(' ',$numbers) . PHP_EOL;

    sort($numbers);

    echo "Sorted numeric array: " . implode(' ',$numbers) . PHP_EOL;

    $words = [
        "Java",
        "Python",
        "PHP",
        "C#",
        "C Programming",
        "C++"
    ];




    echo "Original string array: " . implode(' ',$words) . PHP_EOL;

    sort($words);

    echo "Sorted string array: " . implode(' ',$words) . PHP_EOL;