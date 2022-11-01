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
                $output.='2';
                break;
            case 'D':
            case 'E':
            case 'F':
                $output.='3';
                break;
            case 'G':
            case 'H':
            case 'I':
                $output.='4';
                break;
            case 'J':
            case 'K':
            case 'L':
                $output.='5';
                break;
            case 'M':
            case 'N':
            case 'O':
                $output.='6';
                break;
            case 'P':
            case 'Q':
            case 'R':
            case 'S':
                $output.='7';
                break;
            case 'T':
            case 'U':
            case 'V':
                $output.='8';
                break;
            case 'W':
            case 'X':
            case 'Y':
            case 'Z':
                $output.='9';
                break;
            default : break;
        }
    }
    echo 'switch case: '.$output . PHP_EOL;

    $output='';
    foreach($keypadLetters as $element){
        if($element === 'A' || $element === 'B' || $element === 'C'){
            $output.='2';
        } else if($element === 'D' || $element === 'E' || $element === 'F'){
            $output.='3';
        } else if($element === 'G' || $element === 'H' || $element === 'I'){
            $output.='4';
        } else if($element === 'J' || $element === 'K' || $element === 'L'){
            $output.='5';
        } else if($element === 'M' || $element === 'N' || $element === 'O'){
            $output.='6';
        } else if($element === 'P' || $element === 'Q' || $element === 'R' || $element === 'S'){
            $output.='7';
        } else if($element === 'T' || $element === 'U' || $element === 'V'){
            $output.='8';
        } else if($element === 'W' || $element === 'Y' || $element === 'Z' || $element === 'X' ){
            $output.='9';
        }
    }