<?php
    class hangmanIllustration{
        private array $hangman;
        private int $adds;
        public function __construct()
        {
            $this->hangman = [];
            $this->reset();
        }

        public function printOut() :void{
            foreach($this->hangman as $column){
                foreach ($column as $row){
                    echo $row;
                }
                echo PHP_EOL;
            }
        }
        public function add() :void{
            $this->adds++;
            $this->hangman[6][6]++;
            switch ($this->adds){
                case 1 :
                    $this->hangman[2][7]='O';
                    break;
                case 2 :
                    $this->hangman[3][7]='|';
                    break;
                case 3 :
                    $this->hangman[4][7]='|';
                    break;
                case 4 :
                    $this->hangman[3][6]='/';
                    break;
                case 5 :
                    $this->hangman[3][8]='\\';
                    break;
                case 6 :
                    $this->hangman[5][8]='\\';
                    break;
                case 7 :
                    $this->hangman[5][6]='/';
                    break;
                default: break;
            }
        }
        public function reset() :void{
            for ($i=0; $i<9; $i++){
                for ($g=0; $g<8; $g++){
                    $this->hangman[$g][$i] = ' ';
                }
            }
            for($i=1; $i<7; $i++) {
                $this->hangman[$i][1] = '|';
            }
            $this->hangman[1][2]='/';

            for($i=1;$i<8;$i++){
                $this->hangman[0][$i] = '_';
            }
            $this->hangman[6][0]='/';
            $this->hangman[6][2]="\\";
            $this->hangman[1][7]='|';
            $this->hangman[6][6]=0;
            $this->hangman[6][7]='/';
            $this->hangman[6][8]='7';
            $this->adds=0;
        }

    }
    $hangman = new hangmanIllustration();

    while(true) {
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
            $hangman->printOut();
            echo "Word: " . implode(' ', $guessedLetters) . PHP_EOL;
            echo PHP_EOL;
            echo "Misses: " . implode(' ', $misses) . PHP_EOL;
            echo PHP_EOL;
            echo "Guess: " . implode(' ', $guess) . PHP_EOL;
            while (true) {
                echo PHP_EOL;
                $input = strtolower(readline('Input a char : '));
                if (preg_match('/^[A-Z]$/i', $input)) {
                    if (!in_array($input, $guess) && !in_array($input, $misses)) {
                        break;
                    } else echo "Char already has been used. Try another!\n";
                } else echo "Incorrect input. Input 1 char!\n";
            }

            if (in_array($input, $wordLetters)) {
                $guess[] = $input;
                echo 'Correct!' . PHP_EOL;
                foreach ($wordLetters as $key => $element) {
                    if ($element === $input) {
                        $guessedLetters[$key] = $input;
                    }
                }
            } else {
                $misses[] = $input;
                $guesses++;
                $hangman->add();
                echo 'Incorrect!'.PHP_EOL;
            }
            echo PHP_EOL;
        }
        $hangman->printOut();
        if ($guesses === $maxGuesses) {
            echo 'You lose!' . PHP_EOL;
        } else echo 'You win!' . PHP_EOL;
        while (true){
            $pattern = "/^y$|^n$/i";
            while (true) {
                $input = readline('Play another game? (Y/N)');
                if(!preg_match($pattern, $input)){
                    echo "Incorrect choice! type y|Y for yes or n|N for no\n";
                } else break;
            }
            $pattern = "/n/i";
            if(preg_match($pattern, $input)){
                exit;
            } else {
                $hangman->reset();
                break;
            }
        }

    }

