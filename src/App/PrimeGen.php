<?php

namespace App;

class PrimeGen
{
    private $core;
    private $primes = [];

    public function __construct(PrimeGen\Core $core)
    {
        $this->core = $core;
    }

    public function generatePrimes($n)
    {
        $count = count($this->primes);

        while ($n > $count) {
            $count = array_push($this->primes, $this->core->nextPrime());
        }

        return array_slice($this->primes, 0, $n);
    }
}
