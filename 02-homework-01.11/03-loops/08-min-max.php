<?php
    class numberSquare{
        private array $numbers;
        private function printOutNumbers(): void {
            echo implode('', $this->numbers) . PHP_EOL;
        }
        private function fillNumbers(int $min, int $max){
            for($i=$min;$i<=$max;$i++){
                $this->numbers[]=$i;
            }

        }
        private function move():void{
            $this->numbers[] = array_shift($this->numbers);
        }
        public function start():void{
            while(true){
                $min = readline('Min?: ');
                if(ctype_digit($min)){
                    $min=intval($min);
                    break;
                } else echo "Input not a valid number\n";
            }
            while(true){
                $max = readline('Max?: ');
                if(ctype_digit($max)){
                    if($min<=$max) {
                        $max = intval($max);
                        break;
                    } else echo "min is bigger than max\n";
                } else echo "Input not a valid number\n";
            }
            $this->fillNumbers($min,$max);
            $this->printOutNumbers();
            for($i=$min;$i<$max;$i++){
                $this->move();
                $this->printOutNumbers();
            }
        }
    }
$program = new numberSquare();
$program->start();
