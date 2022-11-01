<?php
    class TicTacToe{
        protected array $board;
        protected string $turn;
        protected int $moves;
        public function __construct(){
            $this->turn = 'X';
            $this->moves = 0;
            for($x=0;$x<3;$x++){
                for($y=0;$y<3;$y++){
                    $this->board[$x][$y] = ' ';
                }
            }
        }
        public function display_board() :void
        {
            for($x=0;$x<3;$x++){
                echo " " . implode(' | ',$this->board[$x]) . "\n";
                if($x!==2){
                    echo '---*---*---'. PHP_EOL;
                }
            }
        }
        public function isTie() :bool{
            return ($this->isWinner()==='-' && $this->moves === 9);
        }

        public function isWinner() :string{
            if( $this->board[0][0]==='Y' && $this->board[0][1]==='Y' && $this->board[0][2]==='Y' ||
                $this->board[1][0]==='Y' && $this->board[1][1]==='Y' && $this->board[1][2]==='Y' ||
                $this->board[2][0]==='Y' && $this->board[2][1]==='Y' && $this->board[2][2]==='Y' ||
                $this->board[0][0]==='Y' && $this->board[1][0]==='Y' && $this->board[2][0]==='Y' ||
                $this->board[0][1]==='Y' && $this->board[1][1]==='Y' && $this->board[2][1]==='Y' ||
                $this->board[0][1]==='Y' && $this->board[1][2]==='Y' && $this->board[2][2]==='Y' ||
                $this->board[0][0]==='Y' && $this->board[1][1]==='Y' && $this->board[2][2]==='Y' ||
                $this->board[0][2]==='Y' && $this->board[1][1]==='Y' && $this->board[2][0]==='Y') return 'Y';
            if( $this->board[0][0]==='X' && $this->board[0][1]==='X' && $this->board[0][2]==='X' ||
                $this->board[1][0]==='X' && $this->board[1][1]==='X' && $this->board[1][2]==='X' ||
                $this->board[2][0]==='X' && $this->board[2][1]==='X' && $this->board[2][2]==='X' ||
                $this->board[0][0]==='X' && $this->board[1][0]==='X' && $this->board[2][0]==='X' ||
                $this->board[0][1]==='X' && $this->board[1][1]==='X' && $this->board[2][1]==='X' ||
                $this->board[0][1]==='X' && $this->board[1][2]==='X' && $this->board[2][2]==='X' ||
                $this->board[0][0]==='X' && $this->board[1][1]==='X' && $this->board[2][2]==='X' ||
                $this->board[0][2]==='X' && $this->board[1][1]==='X' && $this->board[2][0]==='X'
            ) return 'X';
            return '-';
        }
        protected function move(int $x,int $y) :void{
            $this->board[$y][$x]=$this->turn;
            if ($this->turn === 'X'){
                $this->turn = 'Y';
            } else $this->turn='X';
        }
        public function isEmpty(int $x,int $y) :bool{
            return $this->board[$y][$x]===' ';
        }
        public function start():void{
            var_dump($this->isTie());
            while(!($this->isTie())&&$this->isWinner()==='-'){
                $this->moves++;
                $this->display_board();
                while(true){
                    $input = readline("'$this->turn',choose your location(row,column): ");
                    if (preg_match('/^\d\s\d$/',$input)){
                        if(3>$input[0]&&$input[0]>=0 && 3>$input[2]&&$input[2]>=0){
                            if($this->isEmpty(intval($input[0]),intval($input[2]))) break;
                            else echo "cell is taken\n";
                        } else echo "coordinates are not in range of 0-2\n";
                    } else echo "incorrect input. input must be format 'x y'. x and y must be integer in range of 0 to 2\n";

                }
                $this->move(intval($input[0]),intval($input[2]));
            }
            $this->display_board();
            echo ($this->isTie() ? 'The game is tie' : "Winner is " . $this->isWinner());
            echo PHP_EOL;
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
                } else $this->restart();
            }


        }
        public function restart() :void{
            $this->turn='X';
            $this->moves=0;
            for($x=0;$x<3;$x++){
                for($y=0;$y<3;$y++){
                    $this->board[$x][$y] = ' ';
                }
            }
            $this->start();
        }

    }
    $game = new TicTacToe();
    $game->start();
