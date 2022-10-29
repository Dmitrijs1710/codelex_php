<?php
    $words = ['word','codelex','wordwrap','trait'];
    $word = $words[(array_rand($words))];
    $maxGuesses = 3;
    $guesses = 0;

    $wordLetters = str_split($word);
    $guessedLetters= [];
    for ($i = 0; $i<count($wordLetters);$i++){
        $guessedLetters[] = "_";
    }
    while ($guesses<$maxGuesses && in_array('_',$guessedLetters)){
        echo implode(' ', $guessedLetters) . PHP_EOL;
        $input = readline('Input a char : ');
        if(in_array($input, $wordLetters)) {
            foreach ($wordLetters as $key=>$element){
                if ($element === $input){
                    $guessedLetters[$key] = $input;
                }
            }
        } else {
            $guesses++;
            echo "incorrect letter. guesses tried $guesses/$maxGuesses" . PHP_EOL;
        }
    }
    if ($guesses===$maxGuesses){
        echo 'you lose'. PHP_EOL;
    } else echo 'you win'. PHP_EOL;
