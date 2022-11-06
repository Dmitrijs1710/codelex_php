<?php
    class RollTwoDice{
        public function rollDice() :int {
            $a = rand(1,6);
            $b = rand(1,6);
            echo ("$a and $b = " . ($a+$b) . PHP_EOL);
            return($a+$b);
        }
        public function userDesireSum() :void{
            while(true){
                $number = readline('Desire sum: ');
                if(ctype_digit($number)){
                    if(intval($number)>=2){
                        if(intval($number)<=12){
                            $number=intval($number);
                            break;
                        } else echo "Desire sum is smaller bigger than 12\n";
                    } else echo "Desire sum is smaller than 2\n";
                } else echo "Input not a number from 2 to 12\n";
            }
            while (true){
                if($number===$this->rollDice()) break;
            }
            echo "Thank you for game!\n";
        }
    }
    $newGame = new RollTwoDice();
    $newGame->userDesireSum();
