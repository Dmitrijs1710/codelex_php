<?php
    echo 'Welcome to Piglet!';

    $score = 0;
    while (true){
        $roll = rand(1,6);
        echo "You rolled a $roll!\n";
        if($roll === 1){
            echo "You got 0 points\n";
            break;
        }
        $score+=$roll;
        $userChoice = '';
        $pattern = "/^y$|^n$/i";
        while (true) {
            $userChoice = readline('Roll again? ');
            if(!preg_match($pattern, $userChoice)){
                echo "Incorrect choice! type y|Y for yes or n|N for no\n";
            } else break;
        }
        $pattern = "/n/i";
        if(preg_match($pattern, $userChoice)){
            echo "You got $score points.\n";
            break;
        }
    }
