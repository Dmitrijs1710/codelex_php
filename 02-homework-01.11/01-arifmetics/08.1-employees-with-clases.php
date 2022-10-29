<?php
    class employee {
    public float $basePay;
    public int $hours;
    public function __construct(float $base, int $hours){
        $this->basePay = $base;
        $this->hours = $hours;
    }
    public function getSalary() :string{
        $base=$this->basePay;
        $hours=$this->hours;
        if($base<8){
            return 'base too low' . PHP_EOL;
        } else if($hours>60){
            return 'hours too big' . PHP_EOL;
        } else if ($hours>40){
            return(($hours-40)*1.5*$base+(40*$base)) . PHP_EOL;
        } else return($hours*$base) . PHP_EOL;
    }
}
    class corporation{
        public array $employees;
        public function getSalaries():void{
            foreach ($this->employees as $key=>$employee){
                echo "Employee number $key salary: " . $employee->getSalary() . PHP_EOL;
            }

        }
    }
    $corp = new corporation();


    $corp->employees[] = new employee(7.5, 35);
    $corp->employees[] = new employee(9.50,61);
    $corp->employees[] = new employee(8.50,60);
    $corp->employees[] = new employee(10,40);
    $corp->employees[] = new employee(10,41);

    $corp->getSalaries();
