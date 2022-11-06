<?php
    $keypad = (string)readline('Input string: ');
    $keypad = strtoupper($keypad);
    $keypadLetters = str_split($keypad);
    $output = '';
    foreach($keypadLetters as $element){
        switch ($element){
            case 'A':
            case 'B':
            case 'C':
                for($i='A';$i<=$element;$i++) {
                    $output .= '2';
                }
                break;
            case 'D':
            case 'E':
            case 'F':
                for($i='D';$i<=$element;$i++) {
                    $output .= '3';
                }
                break;
            case 'G':
            case 'H':
            case 'I':
                for($i='G';$i<=$element;$i++) {
                    $output .= '4';
                }
                break;
            case 'J':
            case 'K':
            case 'L':
                for($i='J';$i<=$element;$i++) {
                    $output .= '5';
                }
                break;
            case 'M':
            case 'N':
            case 'O':
                for($i='M';$i<=$element;$i++) {
                    $output .= '6';
                }
                break;
            case 'P':
            case 'Q':
            case 'R':
            case 'S':
                for($i='P';$i<=$element;$i++) {
                    $output .= '7';
                }
                break;
            case 'T':
            case 'U':
            case 'V':
                for($i='T';$i<=$element;$i++) {
                    $output .= '8';
                }
                break;
            case 'W':
            case 'X':
            case 'Y':
            case 'Z':
                for($i='W';$i<=$element;$i++) {
                    $output .= '9';
                }
                break;
            default : break;
        }
        $output.=' ';
    }
    echo 'switch case: '.$output . PHP_EOL;

    $output='';
    foreach($keypadLetters as $element){
        if($element === 'A' || $element === 'B' || $element === 'C'){
            for($i='A';$i<=$element;$i++) {
                $output .= '2';
            }
        } else if($element === 'D' || $element === 'E' || $element === 'F'){
            for($i='D';$i<=$element;$i++) {
                $output .= '3';
            }
        } else if($element === 'G' || $element === 'H' || $element === 'I'){
            for($i='G';$i<=$element;$i++) {
                $output .= '4';
            }
        } else if($element === 'J' || $element === 'K' || $element === 'L'){
            for($i='J';$i<=$element;$i++) {
                $output .= '5';
            }
        } else if($element === 'M' || $element === 'N' || $element === 'O'){
            for($i='M';$i<=$element;$i++) {
                $output .= '6';
            }
        } else if($element === 'P' || $element === 'Q' || $element === 'R' || $element === 'S'){
            for($i='P';$i<=$element;$i++) {
                $output .= '7';
            }
        } else if($element === 'T' || $element === 'U' || $element === 'V'){
            for($i='T';$i<=$element;$i++) {
                $output .= '8';
            }
        } else if($element === 'W' || $element === 'Y' || $element === 'Z' || $element === 'X' ){
            for($i='W';$i<=$element;$i++) {
                $output .= '9';
            }
        }
        $output.=' ';
    }
    echo 'nested if: '. $output . PHP_EOL;