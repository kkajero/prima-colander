#!/usr/bin/env php

<?php

require_once 'vendor/autoload.php';

use App\PrimeGen;
use App\PrimeGen\Sieve;

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
