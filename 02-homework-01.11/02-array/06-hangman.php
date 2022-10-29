<?php

    $words = ['word', 'codelex', 'wordwrap', 'trait'];
    $word = $words[(array_rand($words))];
    $maxGuesses = 7;
    $guesses = 0;

    $wordLetters = str_split($word);
    $guessedLetters = [];
    for ($i = 0; $i < count($wordLetters); $i++) {
        $guessedLetters[] = "_";
    }
    $misses = [];
    $guess = [];


    while ($guesses < $maxGuesses && in_array('_', $guessedLetters)) {
        echo str_repeat('-=',10) . '-' . PHP_EOL;
        echo PHP_EOL;
        echo "Word: " . implode(' ', $guessedLetters) . PHP_EOL;
        echo PHP_EOL;
        echo "Misses: " . implode(' ',$misses) . PHP_EOL;
        echo PHP_EOL;
        echo "Guess: " . implode(' ',$guess) . PHP_EOL;
        while(true){
            echo PHP_EOL;
            $input = strtolower(readline('Input a char : '));
            if (preg_match('/^[A-Z]$/i',$input)){
                if(!in_array($input,$guess)&&!in_array($input,$misses)){
                    break;
                } else echo "Char already has been used. Try another!\n";
            } else echo "Incorrect input. Input 1 char!\n";
        }

        if (in_array($input, $wordLetters)) {
            $guess[] = $input;
            foreach ($wordLetters as $key => $element) {
                if ($element === $input) {
                    $guessedLetters[$key] = $input;
                }
            }
        } else {
            $misses[] = $input;
            $guesses++;
            echo "incorrect letter. guesses tried $guesses/$maxGuesses" . PHP_EOL;
        }
        echo PHP_EOL;
    }
    echo PHP_EOL;

    if ($guesses === $maxGuesses) {
        echo 'you lose' . PHP_EOL;
    } else echo 'you win' . PHP_EOL;

