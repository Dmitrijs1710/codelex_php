<?php

    $data = fopen("data.txt", "r") or die("Unable to open file!");
    $tmp = '';
    $currentChar = '';
    $person = new \stdClass;
    while (!feof($data)){
        $currentChar=fgetc($data);
        if (!($tmp === '' && $currentChar === ' ')) {
            if ($currentChar !== ',' && !feof($data)) {
                $tmp .= $currentChar;
            } else if (!property_exists($person, 'name')) {
                $person->name = $tmp;
                $tmp = '';
            } else if (!property_exists($person, 'surname')) {
                $person->surname = $tmp;
                $tmp = '';
            } else if (!property_exists($person, 'age')) {
                $person->age = $tmp;
                $tmp = '';
            }
        }

    }

    fclose($data);
    echo $person->name . ' ' . $person->surname . ' ' . $person->age . PHP_EOL;

