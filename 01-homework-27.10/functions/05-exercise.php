<?php
    $fruits = [
        [
            'fruit' => 'apple',
            'weight' => 5,
        ],
        [
            'fruit' => 'pineapple',
            'weight' => 20,
        ],
        [
            'fruit' => 'banana',
            'weight' => 10,
        ],
        [
            'fruit' => 'watermelon',
            'weight' => 15,
        ]
    ];
    function weight($fruit): bool
    {
        if ($fruit['weight']>10){
            return true;
        }
        return false;
    }
    echo exercise5 . phpweight($fruits[0]);
    $costOfTransfer = [];
    function calculateCost($arr): array
    {
        $tmp = [];
        $costOfKg = 1;
        for ($i = 0; $i<count($arr);$i++){
            if (weight($arr[$i])) {
                $tmp[$i] = (array)[
                    'name' => $arr[$i]['fruit'],
                    'cost' => $arr[$i]['weight'] * $costOfKg * 2
                ];
            } else {
                $tmp[$i] = (array)[
                    'name' => $arr[$i]['fruit'],
                    'cost' => $arr[$i]['weight'] * $costOfKg
                ];
            }
        }
        return $tmp;
    }
    $costOfTransfer = calculateCost($fruits);
    foreach ($costOfTransfer as $position){
        echo $position['name'] . ' ' . $position['cost'] . PHP_EOL;
    }