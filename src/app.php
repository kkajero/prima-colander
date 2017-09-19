#!/usr/bin/env php

<?php

require_once 'vendor/autoload.php';

use App\PrimeGen;
use App\PrimeGen\Sieve;
use jc21\CliTable;
use jc21\CliTableManipulator;

$n = intval($argv[1] ?? 0);
if (1 > $n) {
    exit("\nPass a value of N, where N >= 1.\n\n");
}

$generator = new PrimeGen(new Sieve(1E6));

try {
    $primes = $generator->generatePrimes($n);
} catch (App\PrimeGen\Exception\LimitReached $e) {
    exit("\nApplication stretched beyond limit configured/allowed! Please try a lower value of N.\n\n");
}

unset($generator);

$grid = new CliTable;
$manipulator = new CliTableManipulator('nicenumber');

$grid->setTableColor('blue');
$grid->setHeaderColor('red');
$grid->addField('', 'prime', $manipulator, 'yellow');

$data = [];
foreach ($primes as $prime) {
    $grid->addField($prime, "product-$prime", $manipulator, 'green');
    $row = ['prime' => $prime];
    foreach ($primes as $multiplier) {
        $row["product-$multiplier"] = $prime * $multiplier;
    }
    array_push($data, $row);
}

unset($primes);

$grid->injectData($data);
$grid->display();
