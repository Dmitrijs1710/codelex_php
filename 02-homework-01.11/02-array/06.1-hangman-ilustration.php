<?php
    class hangmanIllustration{
        private array $hangman;
        private array $guess;
        private array $misses;
        private array $guessedLetters;
        private array $wordLetters;
        private string $input;
        private array $words = ['word', 'codelex', 'wordwrap', 'trait'];
        private int $maxGuess;
        private int $guesses;



        public function getMaxGuess(): int
        {
            return $this->maxGuess;
        }

        public function getInput(): string
        {
            return $this->input;
        }

        public function getWordLetters(): array
        {
            return $this->wordLetters;
        }


        public function getGuessedLetters(): array
        {
            return $this->guessedLetters;
        }


        public function getGuess(): array
        {
            return $this->guess;
        }


        public function getMisses(): array
        {
            return $this->misses;
        }

        /**
         * @param array $words
         */
        public function setWords(array $words): void //added for later adding new words
        {
            $this->words = $words;
        }

        public function getGuessedLettersString(): string
        {
            return implode(' ',$this->guessedLetters);
        }

        public function getGuesses(): int
        {
            return $this->guesses;
        }

        public function getMissesString(): string
        {
            return implode(' ',$this->misses);
        }


        public function getGuessString(): string
        {
            return implode(' ',$this->misses);
        }

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

        private function input() :string{
            while (true) {
                echo PHP_EOL;
                $input = strtolower(readline('Input a char : '));
                if (preg_match('/^[A-Z]$/i', $input)) {
                    if (!in_array($input, $this->getGuess()) && !in_array($input, $this->getMisses())) {
                        return $input;
                    } else echo "Char already has been used. Try another!\n";
                } else echo "Incorrect input. Input 1 char!\n";
            }
        }

        private function addPart() :void{
            $this->hangman[6][6]++;
            switch ($this->getGuesses()-($this->getMaxGuess()-7)){
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
        public function inputYorN() :bool{
            $pattern = "/^y$|^n$/i";
            while (true) {
                $input = readline('Play another game? (Y/N)');
                if(!preg_match($pattern, $input)){
                    echo "Incorrect choice! type y|Y for yes or n|N for no\n";
                } else break;
            }
            $pattern = "/y/i";
            return (bool)(preg_match($pattern, $input));
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

            $this->guesses = 0;
            $this->misses = [];
            $this->guess = [];

            $word = $this->words[(array_rand($this->words))];
            $this->wordLetters = str_split($word);
            $this->guessedLetters = [];

            $this->maxGuess=count($this->wordLetters)+3;
            $this->hangman[6][8]=$this->maxGuess;

            for ($i = 0; $i < count($this->wordLetters); $i++) {
                $this->guessedLetters[] = "_";
            }



            $this->input='';
        }
        public function start() :void {
            while ($this->getGuesses() < $this->getMaxGuess() && in_array('_', $this->getGuessedLetters())) {
                $this->printOut();
                echo "Word: " . $this->getGuessedLettersString() . PHP_EOL;
                echo PHP_EOL;
                echo "Misses: " . $this->getMissesString() . PHP_EOL;
                echo PHP_EOL;
                echo "Guess: " . $this->getGuessString() . PHP_EOL;
                $this->input = $this->input();

                if (in_array($this->getInput(), $this->getWordLetters())) {
                    $this->guess[] = $this->getInput();
                    echo 'Correct!' . PHP_EOL;
                    foreach ($this->getWordLetters() as $key => $element) {
                        if ($element === $this->getInput()) {
                            $this->guessedLetters[$key] = $this->getInput();
                        }
                    }
                } else {
                    $this->misses[] = $this->input;
                    $this->guesses++;
                    $this->addPart();
                    echo 'Incorrect!'.PHP_EOL;
                }
                echo PHP_EOL;
            }
            $this->printOut();
            if ($this->getGuesses() === $this->getMaxGuess()) {
                echo 'You lose!' . PHP_EOL;
            } else echo 'You win!' . PHP_EOL;
            if($this->inputYorN()){
                $this->reset();
                $this->start();
            } else exit;
        }
    }
    $hangman = new hangmanIllustration();
    $hangman->start();




