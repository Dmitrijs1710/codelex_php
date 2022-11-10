<?php
include_once 'SavingsAccount.php';
$amount = (float)readline("How much money is in the account?: ");
$account = new SavingsAccount($amount);
$rate = (float)readline("Enter the annual interest rate?: ");
$account->annualRate = $rate;
$months = (int) readline("How long has the account been opened?: ");
$deposited = 0;
$withdraw = 0;
$interest = 0;
for ($i=1;$i<=$months;$i++){
    $amount = (float)readline("Enter amount deposited for month: $i: ");
    $account->deposit($amount);
    $deposited += $amount;
    $amount = (float)readline("Enter amount withdrawn for $i: ");
    try {
        $account->withdraw($amount);
        $withdraw += $amount;
    } catch (LogicException $e){
        echo $e->getMessage() . PHP_EOL;
    }
    $tmp = $account->getAmount();
    $account->addMonthlyInterest();
    $interest += $account->getAmount()-$tmp;
}

echo "Total deposited: $" . number_format($deposited,2) . PHP_EOL;
echo "Total withdrawn: $" . number_format($withdraw,2) . PHP_EOL;
echo "Interest earned: $" . number_format($interest,2) . PHP_EOL;
echo "Ending balance: $" . number_format($account->getAmount(),2) . PHP_EOL;