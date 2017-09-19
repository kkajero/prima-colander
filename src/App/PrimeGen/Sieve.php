<?php

namespace App\PrimeGen;

/**
 * Implements the Sieve of Eratosthenes algorithm: http://primes.utm.edu/glossary/xpage/SieveOfEratosthenes.html
 */
class Sieve implements Core
{
    private $integers;
    private $currentPrime = 2;
    private $end = 12;
    private $atStart = true;

    public function __construct()
    {
        $range = range($this->currentPrime, $this->end);
        $this->integers = array_fill_keys($range, true);
    }

    public function currentPrime()
    {
        return $this->currentPrime;
    }

    public function nextPrime()
    {
        if ($this->atStart) {
            $this->atStart = false;
            return $this->currentPrime;
        }

        $this->strikeOutCurrentPrimeMultiples();

        return $this->seekToNextPrime();
    }

    private function strikeOutCurrentPrimeMultiples()
    {
        for ($i = $this->currentPrime ** 2; $i < $this->end; $i += $this->currentPrime) {
            $this->integers[$i] = false;
        }
    }

    private function seekToNextPrime()
    {
        $next = $this->currentPrime + 1;
        while ($next < $this->end && !$this->integers[$next]) {
            $next++;
        }
        $this->currentPrime = $next;

        return $next;
    }
}
