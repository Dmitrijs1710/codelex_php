<?php
    class Date {
        protected int $month;
        protected int $day;
        protected int $year;

        protected const DAYS_IN_MONTH = array(31,28,31,30,31,30,31,31,30,31,30,31);
        public function __construct(int $day,int $month,int $year)
        {
            if($year>0){
                $this->year = $year;
            } else throw new Error('Incorrect year'. PHP_EOL);
            if ($month > 0 && $month <= 12){
                $this->month = $month;
            } else throw new Error('Incorrect month'. PHP_EOL);
            if ($day > 0 && $day < Date::DAYS_IN_MONTH[$month - 1]){
                $this->day = $day;
            } else if($this::bigYear($year) && ($month === 2 && $day === 29)){
                $this->day = $day;
            } else throw new Error('Incorrect day'.PHP_EOL);

        }

        /**
         * @param int $day
         */
        public function setDay(int $day): void
        {   if($day > 0 && $day <= Date::DAYS_IN_MONTH[$this->month - 1] )
            {
                $this->day = $day;
            } else if ($this::bigYear($this->year) && ($this->month === 2 && $day === 28))
            {
                $this->day = $day;
            } else throw new LogicException('Incorrect day');
        }

        /**
         * @param int $month
         */
        public function setMonth(int $month): void
        {
            if($month > 0 && $month <= 12 && $this->day <= $this::DAYS_IN_MONTH[$month - 1])
            {
                $this->month = $month;
            } else {
                throw new LogicException('Incorrect Month');
            }
        }

        /**
         * @param int $year
         */
        public function setYear(int $year): void
        {
            if ($this->year >= 0)
            {
                if ($this::bigYear($year) && $this->day === 29 && $this->month === 2)
                {
                    $this->year = $year;
                } else if(!$this::bigYear($year) && !($this->day === 29 && $this->month === 2))
                {
                    $this->year = $year;
                } else {
                    throw new LogicException('Incorrect Year based on the day and month');
                }

            } else {
                throw new LogicException('Incorrect Year. Year is less than 0');
            }

        }

        public static function bigYear($year) :bool
        {
            return ($year % 4 === 0);
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

        public function printOutDate() :string
        {
            return "$this->day/$this->month/$this->year" . PHP_EOL;
        }
    }


