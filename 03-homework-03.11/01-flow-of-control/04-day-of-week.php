<?php
    $dayNumber = (int)readline('Input integer from 0 to 6 :');

    echo 'Nested if-else: ';
    if($dayNumber===0){
        echo "Sunday\n";
    } else if($dayNumber===1){
        echo "Monday\n";
    } else if($dayNumber===2){
        echo "Tuesday\n";
    } else if($dayNumber===3){
        echo "Wednesday\n";
    } else if($dayNumber===4){
        echo "Thursday\n";
    } else if($dayNumber===5){
        echo "Friday\n";
    } else if($dayNumber===6){
        echo "Saturday\n";
    } else echo "incorrect input\n";

    echo 'switch-case-default: ';
    switch ($dayNumber) {
        case 0:
            echo "Sunday\n";
            break;
        case 1:
            echo "Monday\n";
            break;
        case 2:
            echo "Tuesday\n";
            break;
        case 3:
            echo "Wednesday\n";
            break;
        case 4:
            echo "Thursday\n";
            break;
        case 5:
            echo "Friday\n";
            break;
        case 6:
            echo "Saturday\n";
            break;
        default:
            echo "incorrect input\n";
            break;
    }

