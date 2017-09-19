<?php

use App\PrimeGen\Sieve;
use PHPUnit\Framework\TestCase;

class SieveTest extends TestCase
{
    public function testCurrentPrime()
    {
        $this->assertEquals(2, $this->sieve->currentPrime());
    }

    public function testNextPrimeStart()
    {
        $this->assertEquals(2, $this->sieve->nextPrime());
    }

    public function testNextPrimeRepeat()
    {
        $this->assertEquals(2, $this->sieve->nextPrime());
        $this->assertEquals(3, $this->sieve->nextPrime());
        $this->assertEquals(3, $this->sieve->currentPrime());
    }

    public function testNextPrimeEnd()
    {
        $sieve = $this->exerciseSieve(7, 4);

        $this->assertEquals(7, $sieve->currentPrime());
    }

    /**
     * @expectedException App\PrimeGen\Exception\LimitReached
     */
    public function testNextPrimeBeyondEnd()
    {
        $sieve = $this->exerciseSieve(7, 5);
    }

    /**
     * Sources of values of N or pi(x): https://primes.utm.edu/howmany.html; http://primes.utm.edu/nthprime/
     */
    public function testNextPrimeSmallRange()
    {
        $sieve = $this->exerciseSieve(1E3, 168);

        $this->assertEquals(997, $sieve->currentPrime());
    }

    public function testNextPrimeMediumRange()
    {
        $sieve = $this->exerciseSieve(1E4, 1229);

        $this->assertEquals(9973, $sieve->currentPrime());
    }

    public function testNextPrimeLargeRange()
    {
        $sieve = $this->exerciseSieve(1E6, 78498);

        $this->assertEquals(999983, $sieve->currentPrime());
    }

    public function setUp()
    {
        $this->sieve = new Sieve;
    }

    private function exerciseSieve($limit, $invocations)
    {
        $sieve = new Sieve($limit);

        $i = 1;
        while ($i <= $invocations) {
            $sieve->nextPrime();
            $i++;
        }

        return $sieve;
    }
}
