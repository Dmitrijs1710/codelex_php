<?php
    $corporation = new stdClass();
    $corporation->employees = [];
    $corporation->getSalaries = function($corp){
        foreach($corp->employees as $key=>$employee){
            echo "Employee $key:" . ($employee->getSalary)($employee->basePay, $employee->hours);
        }
    };

    function createEmployee($corp,$base, $hours){
        $employee = new stdClass();
        $employee->basePay = $base;
        $employee->hours = $hours;
        $employee->getSalary = function($base,$hours){
            if($base<8){
                return 'base too low' . PHP_EOL;
            } else if($hours>60){
                return 'hours too big' . PHP_EOL;
            } else if ($hours>40){
                return(($hours-40)*1.5*$base+(40*$base)) . PHP_EOL;
            } else return($hours*$base) . PHP_EOL;
        };
        $corp->employees[]=$employee;
    }
    createEmployee($corporation,7.50,35);
    createEmployee($corporation,8.50,60);
    createEmployee($corporation,10,35);
    createEmployee($corporation,10,50);

    ($corporation->getSalaries)($corporation);

    var_dump($corporation);