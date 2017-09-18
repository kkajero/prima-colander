<?php

use App\PrimeGen;
use PHPUnit\Framework\TestCase;

class PrimeGenTest extends TestCase
{
    public function setUp()
    {
        $promise = new stdClass;
        $promise->counter = 0;
        $promise->values = [2, 3];

        $core = $this->prophesize('App\PrimeGen\Core');
        $core->nextPrime()->will(function () use ($promise) {
            return $promise->values[$promise->counter++];
        })->shouldBeCalled();

        $this->generator = new PrimeGen($core->reveal());
    }

    public function testGenerate1Prime()
    {
        $n = 1;
        $this->assertEquals([2], $this->generator->generatePrimes($n));
    }

    public function testGenerate2Primes()
    {
        $n = 2;
        $this->assertEquals([2, 3], $this->generator->generatePrimes($n));
    }
}
