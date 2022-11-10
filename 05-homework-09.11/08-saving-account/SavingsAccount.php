<?php
    class SavingsAccount{
        protected float $amount;
        public float $annualRate;
        public function __construct(float $amount)
        {
            $this->amount = $amount;
        }

        /**
         * @return float
         */
        public function getAmount(): float
        {
            return $this->amount;
        }

        public function deposit(float $amount) :void
        {
            $this->amount += $amount;
        }

        public function withdraw(float $amount) :void
        {
            if($this->amount - $amount >= 0)
            {
                $this->amount-=$amount;
            } else {
                throw new LogicException('insufficient user amount');
            }
        }

        public function addMonthlyInterest() :void
        {
            $this->amount += $this->amount * $this->annualRate / 12;
        }

    }
