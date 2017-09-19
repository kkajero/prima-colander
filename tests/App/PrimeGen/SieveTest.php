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

    public function setUp()
    {
        $this->sieve = new Sieve;
    }
}
