<?php


    $payTable = [
        '9'=>[0,5,25,100],
        'J'=>[0,5,25,100],
        'Q'=>[0,5,25,100],
        'K'=>[0,5,40,150],
        'A'=>[0,5,40,150],
        '*'=>[5,35,100,350],
        '#'=>[5,35,100,350],
        'F'=>[5,40,400,2000],
        'M'=>[10,100,1000,5000],
        'B'=>[10,100,1000,5000]
    ];
    $bonusWildPayTable = [2,20,200];


    function getWinAmount(array $payTable,array $slot,int $lines,string $exception='',bool $bonus=false):int{
        $combinations=[
            [
                [0,1],[1,1],[2,1],[3,1],[4,1]
            ],
            [
                [0,0],[1,0],[2,0],[3,0],[4,0]
            ],
            [
                [0,2],[1,2],[2,2],[3,2],[4,2]
            ],
            [
                [0,0],[1,1],[2,2],[3,1],[4,0]
            ],
            [
                [0,2],[1,1],[2,0],[3,1],[4,2]
            ],
            [
                [0,1],[1,0],[2,0],[3,0],[4,1]
            ],
            [
                [0,1],[1,2],[2,2],[3,2],[4,1]
            ],
            [
                [0,2],[1,1],[2,1],[3,1],[4,0]
            ],
            [
                [0,2],[1,2],[2,1],[3,0],[4,0]
            ],
            [
                [0,0],[1,0],[2,1],[3,2],[4,2]
            ]
        ];
        $winAmount=0;
        if(!$bonus) {
            foreach ($combinations as $key => $combination) {
                if ($key === $lines) {
                    break;
                }
                $count = 0;
                [$x, $y] = $combination[0];
                $symbol = $slot[$y][$x];
                //B is the Wild;
                if ($symbol !== 'B') {
                    foreach ($combination as $coordinates) {
                        [$x, $y] = $coordinates;
                        if (($slot[$y][$x] === $symbol || $slot[$y][$x] === 'B') && $slot[$y][$x] !== $exception) {
                            $count++;
                        } else break;
                    }
                    if ($count > 1) {
                        $winAmount += $payTable[$symbol][$count - 2];
                    }
                } else {
                    $maxWin = 0;
                    foreach ($combination as $coordinates) {
                        [$x, $y] = $coordinates;
                        if ($symbol === 'B' && $slot[$y][$x] !== 'B') {
                            $symbol = $slot[$y][$x];
                        }
                        if (($slot[$y][$x] === $symbol || $slot[$y][$x] === 'B') && $slot[$y][$x] !== $exception) {
                            $count++;
                            if ($count > 1) {
                                $maxWin = max($payTable[$symbol][$count - 2], $maxWin);
                            }
                        } else break;
                    }
                    if ($count > 1) {
                        $winAmount += max($payTable[$symbol][$count - 2], $maxWin);
                    } else $winAmount+=$maxWin;

                }
            }
        }
        else {
            foreach ($combinations as $combination){
                $count=0;
                foreach ($combination as $coordinates) {
                    [$x, $y] = $coordinates;
                    if($slot[$y][$x]===$exception){
                        $count++;
                    }
                }
                if($count>1){
                    $winAmount +=$payTable[$exception][$count - 2];
                }
            }
        }
        return($winAmount);
    }
    function randomSymbol() :string{
        //the more symbols pay, the less they can drop
        $variations=[
            [4,"9"],
            [4,"J"],
            [4,"Q"],
            [3,"K"],
            [3,"A"],
            [2,"*"],
            [2,"#"],
            [1,"F"],
            [1,"M"],
            [1,"B"]
        ];
        $randomSymbols=[];
        foreach($variations as $variation){
            [$a,$symbol]=$variation;
            for($i=0;$i<$a;$i++){
                $randomSymbols[]=$symbol;
            }
        }
        return $randomSymbols[array_rand($randomSymbols)];
    }

    function displaySlot(array $slot):void{
        for($y=0;$y<3;$y++){
            echo " " . implode(' | ',$slot[$y]) . "\n";
            if($y!==2){
                echo '---*---*---*---*---'. PHP_EOL;
            }
        }
    }
    function randSlot(array &$slot) :void{
            //every row in a column must be unique
        for($x=0;$x<count($slot[0]);$x++){
            for($y=0;$y<count($slot);$y++){
                while(true){
                    $slot[$y][$x]=randomSymbol();
                    $randBool=true;
                    for($i=0; $i<$y;$i++){
                        if($slot[$i][$x]===$slot[$y][$x]){
                            $randBool=false;
                            break;
                        }
                    }
                    if($randBool){
                        break;
                    }
                }

            }
        }

    }
    //game initialize
    $bonusWild = 'B';
    for ($y=0;$y<3;$y++){
        for ($x=0;$x<5;$x++){
            $slot[$y][$x]='-';
        }
    }
    $balance=1000;
    $lines=10;
    $multiplier=1;
    $win = 0;
    $freeSpinsCount=0;
    $bonusSymbol=0;
    $bonus=false;
    $stake=$multiplier*$lines;
    echo PHP_EOL;
    displaySlot($slot);
    echo "lines: $lines, multiplier: $multiplier stake: $stake \n";
    echo "Balance: $balance\n";

    //game cycle
    while(true){
        echo PHP_EOL;
        //player's choice
        $pattern = "/^d$|^t$|^e$|^l$|^m$/i";
        $input = readline('Spin: "Enter", PayTable: "t", change lines: "l", change multiplier: "m", exit: "e", deposit: "d"! your choice: ');
        if(!(preg_match($pattern, $input)||empty($input))){
            echo "Incorrect choice!\n";
        }
        //exit
        $pattern = "/e/i";
        if(preg_match($pattern, $input)){
            echo 'Hope to see you with your money again soon!' . PHP_EOL;
            exit;
        }
        //change lines in play
        $pattern = "/l/i";
        if(preg_match($pattern, $input)){
            if($freeSpinsCount===0) {
                while (true) {
                    $lines = (int)readline('Enter lines :');
                    if ($lines > 0 && $lines <= 10) {
                        $stake=$multiplier*$lines;
                        break;
                    }
                }
            } else {
                echo 'Sorry bonus play. Finish the free spins to change the lines' . PHP_EOL;
            }
            continue;
        }
        //change multiplier
        $pattern = "/m/i";
        if(preg_match($pattern, $input)){
            if($freeSpinsCount===0) {
                while(true){
                    $multiplier = (int)readline('Enter multiplier: ');
                    if($multiplier>0){
                        $stake=$multiplier*$lines;
                        break;
                    }
                }
            } else {
                echo 'Sorry bonus play. Finish the free spins to change the multiplier' . PHP_EOL;
            }
            continue;
        }
        //deposit money
        $pattern = "/d/i";
        if(preg_match($pattern, $input)){
            while(true){
                $input = (int)readline('Enter balance: ');
                if ($input>0){
                    $balance+=$input;
                    break;
                } else echo ('incorrect balance') . PHP_EOL;
            }
            continue;
        }
        //prints payout table and rules depending on the multiplier
        $pattern = "/t/i";
        if(preg_match($pattern, $input)){
            echo PHP_EOL;
            foreach ($payTable as $symbol=>$pays){
                echo "$symbol - ";
                foreach ($pays as $key=>$pay){
                    if($pay>0){
                        $count=$key+2;
                        $multiPay=$multiplier*$pay;
                        echo "$count: $multiPay  ";
                    }
                }
                echo PHP_EOL;
            }
            echo "BonusWild symbol is $bonusWild ! 3+ triggers free spins with bonus symbol\n";
            echo "In bonus play bonus symbol expands in every column if encountered in than column once\n";
            echo "Bonus symbol can be any symbol expect $bonusWild\n";
            echo "BonusWild - ";
            for($i=0;$i<count($bonusWildPayTable);$i++){
                $tmp=$i+3;
                echo "$tmp: $bonusWildPayTable[$i]  ";
            }
            echo "in any cell\n";
            continue;
        }
        //if user doesn't have enough money
        if($balance<$stake&&$freeSpinsCount===0){
            echo 'Sorry insufficient balance. please deposit' . PHP_EOL;
            continue;
        }
        echo PHP_EOL;
        //check for free spins status
        if($freeSpinsCount===0){
            $bonusSymbol='';
            $bonus = false;
            $balance-=$stake;
        } else {
            $bonus=true;
            $freeSpinsCount--;
            echo $freeSpinsCount>0?"Wins spins left: $freeSpinsCount! Bonus symbol: $bonusSymbol \n":"Free Spins finished\n";
        }
        //generate new spin and adds initial win
        randSlot($slot);
        displaySlot($slot);
        //we don't use cash bonus symbol if there are free spins. we cash it only if expands
        if($bonus){
            $win=$multiplier*getWinAmount($payTable,$slot,$lines,$bonusSymbol);
        } else $win=$multiplier*getWinAmount($payTable,$slot,$lines);

        //3+ books check
        $count=0;
        foreach ($slot as $row){
            foreach($row as $column){
                if($column===$bonusWild){
                    $count++;
                }
            }
        }
        $winB=0;
        if($count>2){
            $winB=$stake*$bonusWildPayTable[$count-3];
            $win+=$winB; //adds books amount
            if($freeSpinsCount===0 && !$bonus){
                while(true){
                    $bonusSymbol = randomSymbol();
                    if($bonusSymbol!==$bonusWild) break; //bonusWild can't be bonus symbol
                }
                echo "Wins spins awarded: 10! Bonus symbol: $bonusSymbol\n";
            } else {
                echo "Wins spins re-triggered: 10! Bonus symbol: $bonusSymbol \n";
            }
            $freeSpinsCount+=10;
        }


        //bonus expansion
        if($bonus){
            for ($x=0;$x<5;$x++){
                for ($y=0;$y<3;$y++){
                    if($slot[$y][$x]===$bonusSymbol){
                        for($g=0;$g<3;$g++){
                            $slot[$g][$x]=$bonusSymbol;
                        }
                        break;
                    }
                }
            }
            $bonusWin=getWinAmount($payTable,$slot,$lines,$bonusSymbol,true);
            if($bonusWin>0){
                $win+=$bonusWin;
                echo PHP_EOL;
                displaySlot($slot);
            }
        }
        //changes the balance
        $balance+=$win;
        echo "lines: $lines, multiplier: $multiplier stake: $stake \n";
        echo "You win: $win\n";
        echo "Balance: $balance\n";
    }


