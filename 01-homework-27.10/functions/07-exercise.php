<?php


    function createGun(string $license, string $name, int $price) :stdClass {
        $gun = new stdClass();
        $gun-> name = $name;
        $gun-> license = $license;
        $gun-> cost = $price;
        return($gun);
    }

    function canBuy(stdClass $gun,stdClass $human) :void{
        if ($human->cash >= $gun->cost && in_array($gun->license, $human->license)) {
            echo 'Thank you purchase ' . $gun->name . PHP_EOL;
        } else if ($human->cash >= $gun->cost){
            echo 'buy license' . PHP_EOL;
        } else echo 'not enough money' .PHP_EOL;
    }

    $guns = [
        createGun('a',
            'glock',
            400)
        ,
        createGun('b',
            'ak47',
            2700)
        ,
        createGun('c',
            'awp',
            4730)
    ];


    $person = (object)[
        'name' => 'Dmitrijs',
        'cash' => 3500,
        'license' => ['a','c']
    ];


    $licenseText = implode(',',$person->license);
    echo "Welcome, {$person->name} ({$person->money}$) [{$licenseText}]".PHP_EOL;

    foreach ($guns as $key=>$gun){
        echo "[{$key}] {$gun->name} ({$gun->cost}) [{$gun->license}]"  .PHP_EOL;
    }

    $selection = (int)readline("Enter weapon to purchase" . PHP_EOL);

    if($guns[$selection] === null){
        echo "Invalid selection" .PHP_EOL;
        exit;
    }

    canBuy($guns[$selection],$person);

