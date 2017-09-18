<?php

use App\PrimeGen;
use PHPUnit\Framework\TestCase;

class PrimeGenTest extends TestCase
{
    public function testGenerate1Prime()
    {
        $core = $this->prophesize('App\PrimeGen\Core');
        $core->nextPrime()->willReturn(2)->shouldBeCalled();
        $generator = new PrimeGen($core->reveal());

        $n = 1;
        $this->assertEquals([2], $generator->generatePrimes($n));
    }
}
