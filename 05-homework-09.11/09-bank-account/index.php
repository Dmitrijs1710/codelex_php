<?php
include_once 'BankAccount.php';
$userName = readline('Enter username: ');
$balance = (int)readline('Enter balance in cents: ');
$bankAccount = new BankAccount($userName, $balance);
echo $bankAccount->show_user_name_and_balance() . PHP_EOL;