<?php
include 'Account.php';

$mattAccount = new Account("Matt's account", 1000);
$myAccount = new Account("My account", 0);
$mattAccount->withdrawal(100.0);
$myAccount->deposit(100.0);

echo $mattAccount->getName() . ': ' . $mattAccount->balance() . PHP_EOL;
echo $myAccount->getName() . ': ' . $myAccount->balance() . PHP_EOL;

echo PHP_EOL;

$a = new Account('A', 100);
$b = new Account('B', 0);
$c = new Account('C', 0);
Account::transfer($a,$b,50);
Account::transfer($b,$c,25);

echo $a->getName() . ': ' . $a->balance() . PHP_EOL;
echo $b->getName() . ': ' . $b->balance() . PHP_EOL;
echo $c->getName() . ': ' . $c->balance() . PHP_EOL;
