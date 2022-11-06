<?php
    class FuelGauge {
        public int $fuelAmountLiters;

        public function __construct(int $fuelAmountLiters = 0){
            $this->fuelAmountLiters=$fuelAmountLiters;
        }

        public function incFuelAmountBy1() :void {
            if ($this->fuelAmountLiters<70){
                echo 'Refueling the car' .PHP_EOL;
                $this->fuelAmountLiters++;
            }
        }

        public function decFuelAmountBy1() :void {
            if ($this->fuelAmountLiters>0){
                $this->fuelAmountLiters--;
            }
        }


        public function printFuelAmountLiters(): void
        {
            echo "$this->fuelAmountLiters litters left \n";
        }
    }

    class Odometer extends FuelGauge {
        public int $mileage;
        protected int $gasConsumption;
        public function __construct(int $mileage, int $fuelAmountLiters=0)
        {
            parent::__construct($fuelAmountLiters);
            $this->mileage=$mileage;
            $this->gasConsumption=10;
        }

        public function printOutMileage() :void{
            echo "the mileage is $this->mileage km\n";
        }

        public function incMileage() :void{
            if($this->fuelAmountLiters>0){
                echo 'car goes 1km forward' .PHP_EOL;
                if($this->mileage===999999){
                    $this->mileage=0;
                } else $this->mileage++;
                if($this->gasConsumption===0){
                    $this->decFuelAmountBy1();
                    $this->gasConsumption=10;
                } else $this->gasConsumption--;
            } else echo 'No fuel'.PHP_EOL;
        }

    }

    $car = new Odometer(999980,5);
    for($i=0;$i<56;$i++){
        $car->incMileage();
        $car->printOutMileage();
        $car->printFuelAmountLiters();
        echo PHP_EOL;
    }
    for($i=0;$i<20;$i++){
        $car->incFuelAmountBy1();
        $car->printOutMileage();
        $car->printFuelAmountLiters();
        echo PHP_EOL;
    }
    for($i=0;$i<5;$i++){
        $car->incMileage();
        $car->printOutMileage();
        $car->printFuelAmountLiters();
        echo PHP_EOL;
    }