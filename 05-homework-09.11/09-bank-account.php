<?php


class BankAccount
{
    private string $userName;
    private int $balance; //balance in cents, avoiding float, thanks to solidity example
    public function __construct(string $userName, int $balance = 0) //balance in cents, avoiding float, thanks to solidity example
    {
        $this->userName = $userName;
        $this->balance = $balance;
    }
    public function show_user_name_and_balance() :string{
        $result=$this->userName;
        if ($this->balance >= 0){
            $result.=", $" . number_format($this->balance/100,2);
        } else {
            $result.=", -$" . number_format(-1 * $this->balance/100,2);
        }
        return $result;
    }

}
$userName = readline('Enter username: ');
$balance = (int)readline('Enter balance in cents: ');
$bankAccount = new BankAccount($userName, $balance);
echo $bankAccount->show_user_name_and_balance() . PHP_EOL;