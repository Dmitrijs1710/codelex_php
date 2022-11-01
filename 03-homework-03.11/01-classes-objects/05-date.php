<?php
    class Date {
        protected int $month;
        protected int $day;
        protected int $year;

        protected const DAYS_IN_MONTH = array(31,28,31,30,31,30,31,31,30,31,30,31);
        public function __construct(int $day,int $month,int $year){
            if($year>0){
                $this->year=$year;
            } else throw new Error('Incorrect year'. PHP_EOL);
            if ($month>0 && $month<=12){
                $this->month= $month;
            } else throw new Error('Incorrect month'. PHP_EOL);
            if ($day >0 && $day<Date::DAYS_IN_MONTH[$month-1]){
                $this->day=$day;
            } else if($this::bigYear($year) && ($month===2 && $day===29)){
                $this->day=$day;
            } else throw new Error('Incorrect day'.PHP_EOL);


        }

        /**
         * @param int $day
         */
        public function setDay(int $day): void
        {   if($day>0 && $day<=Date::DAYS_IN_MONTH[$this->month-1] ) {
                $this->day = $day;
            } else if ($this::bigYear($this->year) && ($this->month===2 && $day===28)){
                $this->day = $day;
            } else echo 'Incorrect day' . PHP_EOL;
        }

        /**
         * @param int $month
         */
        public function setMonth(int $month): void
        {
            if($month>0 && $month <=12 && $this->day<=$this::DAYS_IN_MONTH[$month-1]) {
                $this->month = $month;
            } else echo 'Incorrect month' . PHP_EOL;
        }

        /**
         * @param int $year
         */
        public function setYear(int $year): void
        {
            if ($this->year>=0) {
                if ($this::bigYear($year)) {
                    if ($this->day === 29 && $this->month === 2) {
                        echo 'incorrect year' . PHP_EOL;
                    } else $this->year = $year;
                } else  $this->year = $year;
            } else echo 'year is less than 0' . PHP_EOL;
        }

        public static function bigYear($year) :bool{
            return ($year % 4===0);
        }

        /**
         * @return int
         */
        public function getDay(): int
        {
            return $this->day;
        }

        /**
         * @return int
         */
        public function getMonth(): int
        {
            return $this->month;
        }

        /**
         * @return int
         */
        public function getYear(): int
        {
            return $this->year;
        }

        public function printOutDate() :void{
            echo "day: $this->day, month: $this->month , year: $this->year\n";
        }
    }


    $date = new Date(29,2,2004);
    echo $date->getDay() . PHP_EOL;
    echo $date->getMonth() . PHP_EOL;
    echo $date->getYear() . PHP_EOL;
    $date->printOutDate();
    $date->setYear(2020);
    $date->printOutDate();
    $date->setDay(12);
    $date->setMonth(10);
    $date->setYear(2020);
    $date->printOutDate();
    $date->setDay(32);
    $date->setMonth(20);
    $date->printOutDate();