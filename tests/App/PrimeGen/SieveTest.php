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

    public function setUp()
    {
        $this->sieve = new Sieve;
    }
}
