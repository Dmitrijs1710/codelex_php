<?php
    $board = [];
    $moves = 0;
    for($x=0;$x<3;$x++){
        for($y=0;$y<3;$y++){
            $board[$y][$x] = ' ';
        }
    }
    function display_board($board)
    {
        for($x=0;$x<3;$x++){
            echo " " . implode(' | ',$board[$x]) . "\n";
            if($x!==2){
                echo '---*---*---'. PHP_EOL;
            }
        }
    }

    function isTie(array $board,int $moves) :bool{
        return isWinner($board)==='-' && $moves===9;
    }

    function isWinner(array $board) :string{
        if( $board[0][0]==='X' && $board[0][1]==='X' && $board[0][2]==='X' ||
            $board[1][0]==='X' && $board[1][1]==='X' && $board[1][2]==='X' ||
            $board[2][0]==='X' && $board[2][1]==='X' && $board[2][2]==='X' ||
            $board[0][0]==='X' && $board[1][0]==='X' && $board[2][0]==='X' ||
            $board[0][1]==='X' && $board[1][1]==='X' && $board[2][1]==='X' ||
            $board[0][1]==='X' && $board[1][2]==='X' && $board[2][2]==='X' ||
            $board[0][0]==='X' && $board[1][1]==='X' && $board[2][2]==='X' ||
            $board[0][2]==='X' && $board[1][1]==='X' && $board[2][0]==='X'
        ) return 'X';
        if( $board[0][0]==='Y' && $board[0][1]==='Y' && $board[0][2]==='Y' ||
            $board[1][0]==='Y' && $board[1][1]==='Y' && $board[1][2]==='Y' ||
            $board[2][0]==='Y' && $board[2][1]==='Y' && $board[2][2]==='Y' ||
            $board[0][0]==='Y' && $board[1][0]==='Y' && $board[2][0]==='Y' ||
            $board[0][1]==='Y' && $board[1][1]==='Y' && $board[2][1]==='Y' ||
            $board[0][1]==='Y' && $board[1][2]==='Y' && $board[2][2]==='Y' ||
            $board[0][0]==='Y' && $board[1][1]==='Y' && $board[2][2]==='Y' ||
            $board[0][2]==='Y' && $board[1][1]==='Y' && $board[2][0]==='Y'
        ) return 'Y';
        return '-';
    }

    function move(string &$turn,array &$board,int $x,int $y) :void{
        $board[$y][$x]=$turn;
        if ($turn === 'X'){
            $turn = 'Y';
        } else $turn='X';
    }

    function isEmpty(array $board,int $x,int $y) :bool{
        return $board[$y][$x]===' ';
    }

    $turn = 'X';
    while(!isTie($board, $moves)&&isWinner($board)==='-'){
        $moves++;
        display_board($board);
        while(true){
            $input = readline("'$turn',choose your location(row,column): ");
            if (preg_match('/^\d\s\d$/',$input)){
                if(3>$input[0]&&$input[0]>=0 && 3>$input[2]&&$input[2]>=0){
                    if(isEmpty($board,intval($input[0]),intval($input[2]))) break;
                    else echo "cell is taken\n";
                } else echo "coordinates are not in range of 0-2\n";
            } else echo "incorrect input. input must be format 'x y'. x and y must be integer in range of 0 to 2\n";

        }
        move($turn,$board,intval($input[0]),intval($input[2]));
    }
    display_board($board);
    echo (isTie($board,$moves)) ? 'The game is tie' : "Winner is " . isWinner($board);
    echo PHP_EOL;



