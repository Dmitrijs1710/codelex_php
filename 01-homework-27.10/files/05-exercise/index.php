<?php

    $data = fopen("data.csv", "r") or die("Unable to open file!");

    $id = 7;

    while (($persons[] = fgetcsv($data, null, ","))!== false ){
        if ($persons[count($persons)-1][0] == $id){
            var_dump($persons[count($persons)-1]);
            break;
        }
    }



    fclose($data);

