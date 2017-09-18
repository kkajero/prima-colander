<?php

namespace App;

class PrimeGen
{
    private $core;

    public function __construct(PrimeGen\Core $core)
    {
        $this->core = $core;
    }

    public function generatePrimes($n)
    {
        return [$this->core->nextPrime()];
    }
}
