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
        $sieve = new Sieve(($integerLimit = 7));

        $i = 1;
        while ($i <= 4) {
            $sieve->nextPrime();
            $i++;
        }

        $this->assertEquals(7, $sieve->currentPrime());
    }

    /**
     * @expectedException App\PrimeGen\Exception\LimitReached
     */
    public function testNextPrimeBeyondEnd()
    {
        $sieve = new Sieve(($integerLimit = 7));

        $i = 1;
        while ($i <= 5) {
            $sieve->nextPrime();
            $i++;
        }
    }

    /**
     * Sources of values of N or pi(x): https://primes.utm.edu/howmany.html; http://primes.utm.edu/nthprime/
     */
    public function testNextPrimeSmallRange()
    {
        $sieve = new Sieve(($integerLimit = 1E3));

        $i = 1;
        while ($i <= 168) {
            $sieve->nextPrime();
            $i++;
        }

        $this->assertEquals(997, $sieve->currentPrime());
    }

    public function setUp()
    {
        $this->sieve = new Sieve;
    }
}
