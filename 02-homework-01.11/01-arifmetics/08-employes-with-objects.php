<?php
    $corporation = new stdClass();
    $corporation->employees = [];
    function getSalaries(stdClass $corp) :void{
        foreach($corp->employees as $key=>$employee){
            echo "Employee $key:" . getSalary($employee->basePay, $employee->hours);
        }
    }
    function createEmployee(stdClass $corp, float $base, int $hours){
        $employee = new stdClass();
        $employee->basePay = $base;
        $employee->hours = $hours;
        $corp->employees[]=$employee;
    }

    function getSalary(float $base, int $hours) :string {
        if($base<8){
            return 'base too low' . PHP_EOL;
        } else if($hours>60){
            return 'hours too big' . PHP_EOL;
        } else if ($hours>40){
            return(($hours-40)*1.5*$base+(40*$base)) . PHP_EOL;
        } else return($hours*$base) . PHP_EOL;
    }
    createEmployee($corporation,7.50,35);
    createEmployee($corporation,8.50,60);
    createEmployee($corporation,10,35);
    createEmployee($corporation,10,50);

    getSalaries($corporation);