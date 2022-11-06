<?php

$firstWord = readline('Enter first word: ');
$secondWord = readline('Enter second word: ');

echo $firstWord . str_repeat('.',30-strlen($firstWord)-strlen($secondWord)) . $secondWord . PHP_EOL;
