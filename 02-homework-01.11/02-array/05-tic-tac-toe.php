<?php
    function display_board(array $board) :void
    {
        for($y=0;$y<3;$y++){
            echo " " . implode(' | ',$board[$y]) . "\n";
            if($y!==2){
                echo '---*---*---'. PHP_EOL;
            }
        }
    }

    function isTie(array $board,int $moves) :bool{
        return isWinner($board)==='-' && $moves===9;
    }

    function isWinner(array $board) :string{
        /*if( $board[0][0]==='X' && $board[0][1]==='X' && $board[0][2]==='X' ||
            $board[1][0]==='X' && $board[1][1]==='X' && $board[1][2]==='X' ||
            $board[2][0]==='X' && $board[2][1]==='X' && $board[2][2]==='X' ||
            $board[0][0]==='X' && $board[1][0]==='X' && $board[2][0]==='X' ||
            $board[0][1]==='X' && $board[1][1]==='X' && $board[2][1]==='X' ||
            $board[0][1]==='X' && $board[1][2]==='X' && $board[2][2]==='X' ||
            $board[0][0]==='X' && $board[1][1]==='X' && $board[2][2]==='X' ||
            $board[0][2]==='X' && $board[1][1]==='X' && $board[2][0]==='X'
        ) return 'X';
        if( $board[0][0]==='O' && $board[0][1]==='O' && $board[0][2]==='O' ||
            $board[1][0]==='O' && $board[1][1]==='O' && $board[1][2]==='O' ||
            $board[2][0]==='O' && $board[2][1]==='O' && $board[2][2]==='O' ||
            $board[0][0]==='O' && $board[1][0]==='O' && $board[2][0]==='O' ||
            $board[0][1]==='O' && $board[1][1]==='O' && $board[2][1]==='O' ||
            $board[0][1]==='O' && $board[1][2]==='O' && $board[2][2]==='O' ||
            $board[0][0]==='O' && $board[1][1]==='O' && $board[2][2]==='O' ||
            $board[0][2]==='O' && $board[1][1]==='O' && $board[2][0]==='O'
        ) return 'O';
        return '-';
        */
        $combinations = [
            [
                [0,0],[0,1],[0,2]
            ],
            [
                [1,0],[1,1],[1,2]
            ],
            [
                [2,0],[2,1],[2,2]
            ],
            [
                [0,0],[1,0],[2,0]
            ],
            [
                [0,1],[1,1],[2,1]
            ],
            [
                [0,2],[1,2],[2,2]
            ],
            [
                [0,0],[1,1],[2,2]
            ],
            [
                [0,2],[1,1],[2,0]
            ]
        ];
        foreach($combinations as $comb){
            $count=0;
            foreach($comb as $coordinate){
                [$x,$y] = $coordinate;
                if($board[$x][$y]!=='X'){
                    break;
                } else $count++;
            }
            if($count===3){
                return 'X';
            }
        }
        foreach($combinations as $comb){
            $count=0;
            foreach($comb as $coordinate){
                [$x,$y] = $coordinate;
                if($board[$x][$y]!=='O'){
                    break;
                } else $count++;
            }
            if($count===3){
                return 'O';
            }
        }
        return '-';
    }

    function move(string &$turn,array &$board,int $x,int $y) :void{
        $board[$y][$x]=$turn;
        if ($turn === 'X'){
            $turn = 'O';
        } else $turn='X';
    }

    function isEmpty(array $board,int $x,int $y) :bool{
        return $board[$y][$x]===' ';
    }
    while(true) {
        $board = [];
        $moves = 0;
        for ($x = 0; $x < 3; $x++) {
            for ($y = 0; $y < 3; $y++) {
                $board[$y][$x] = ' ';
            }
        }


        $turn = 'X';
        while (!isTie($board, $moves) && isWinner($board) === '-') {
            $moves++;
            echo PHP_EOL;
            display_board($board);
            while (true) {
                $input = readline("'$turn',choose your location(row,column): ");
                if (preg_match('/^\d\s\d$/', $input)) {
                    if (3 > $input[0] && $input[0] >= 0 && 3 > $input[2] && $input[2] >= 0) {
                        if (isEmpty($board, intval($input[0]), intval($input[2]))) break;
                        else echo "cell is taken\n";
                    } else echo "coordinates are not in range of 0-2\n";
                } else echo "incorrect input. input must be format 'x y'. x and y must be integer in range of 0 to 2\n";

            }
            move($turn, $board, intval($input[0]), intval($input[2]));

        }
        echo PHP_EOL;
        display_board($board);
        echo (isTie($board, $moves)) ? 'The game is tie' : "Winner is " . isWinner($board);
        echo PHP_EOL;
        echo PHP_EOL;
        $pattern = "/^y$|^n$/i";
        while (true) {
            $input = readline('Play another game? (Y/N)');
            if(!preg_match($pattern, $input)){
                echo "Incorrect choice! type y|Y for yes or n|N for no\n";
            } else break;
        }
        $pattern = "/y/i";
        if(!preg_match($pattern, $input)){
            break;
        }
        echo PHP_EOL;
    }



