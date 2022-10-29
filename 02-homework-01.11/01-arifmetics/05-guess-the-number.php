<?php
    $number = rand(1,100);


    echo "I'm thinking of a number between 1-100.  Try to guess it." . PHP_EOL;
    $userGuess = (int) readline();
    if ($userGuess>$number){
        echo "Sorry, you are too high. I was thinking of $number." . PHP_EOL;
    } else if($userGuess<$number){
        echo "Sorry, you are too low. I was thinking of $number." . PHP_EOL;
    } else echo "You guessed it!  What are the odds?!?" . PHP_EOL;

