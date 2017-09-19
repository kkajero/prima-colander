<?php

namespace App\PrimeGen;

/**
 * Implements the Sieve of Eratosthenes algorithm: http://primes.utm.edu/glossary/xpage/SieveOfEratosthenes.html
 */
class Sieve implements Core
{
    private $integers;
    private $end;
    private $currentPrime = 2;
    private $atStart = true;

    public function __construct($integerLimit = 100)
    {
        $this->end = $integerLimit;
        $range = range($this->currentPrime + 1, $this->end, 2);
        $this->integers = array_fill_keys($range, true);
    }

    public function currentPrime()
    {
        return $this->currentPrime;
    }

    /**
     * @throws App\PrimeGen\Exception\LimitReached when configured integer limit is exceeded
     *
     * @return integer
     */
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
        for ($i = $this->currentPrime ** 2; $i <= $this->end; $i += $this->currentPrime) {
            $this->integers[$i] = false;
        }
    }

    private function seekToNextPrime()
    {
        $next = $this->currentPrime + 1;

        while (isset($this->integers[$next]) && $next < $this->end && !$this->integers[$next]) {
            $next++;
        }

        if ($next <= $this->end) {
            $this->currentPrime = $next;
        } else {
            throw new Exception\LimitReached;
        }

        return $this->currentPrime;
    }
}
