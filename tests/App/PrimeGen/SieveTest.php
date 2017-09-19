<?php

use App\PrimeGen\Sieve;
use PHPUnit\Framework\TestCase;

class SieveTest extends TestCase
{
    public function testCurrentPrime()
    {
        $this->assertEquals(2, $this->sieve->currentPrime());
    }

    public function testNextPrime()
    {
        $this->assertEquals(2, $this->sieve->nextPrime());
    }

    public function setUp()
    {
        $this->sieve = new Sieve;
    }
}
