<?php
    while (true){
        $size = readline('Enter figure size :');
        if (ctype_digit($size)) break; else echo "Incorrect input. Try again\n";
    }
    $size = intval($size);
    var_dump($size);
    for($i = 0; $i < $size; $i++){
        $row ='';
        if(($size - 1 -  $i) > 0){
            $row = str_repeat("/", ($size - 1 - $i) * 4);
        }
        if ($i > 0){
            $row.= str_repeat('*',$i * 8);
        }
        if(($size - 1 -  $i) > 0) {
            $row .= str_repeat("\\", ($size - 1 -  $i) * 4);
        }
        echo $row .PHP_EOL;
    }