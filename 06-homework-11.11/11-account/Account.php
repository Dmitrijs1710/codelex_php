<?php
class Account{
    private int $balance;
    private string $name;
    public function __construct(string $name, int $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function balance(): int
    {
        return $this->balance;
    }

    public function deposit(int $amount) :void
    {
        $this->balance += $amount;
    }

    public function withdrawal(int $amount) :void
    {
        $this->balance -= $amount;
    }

    public static function transfer(Account $from, Account $to, int $howMuch) :void
    {
        if($from->balance()>=$howMuch)
        {
            $from->withdrawal($howMuch);
            $to->deposit($howMuch);
        }
    }
}