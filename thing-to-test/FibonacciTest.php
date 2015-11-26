<?php

use GedasTheEvil as G;

class FibonacciTest extends G\BaseTest
{
    public function testFistNumber()
    {
        G\Assertion::assertEquals(1, Fibonacci::get(1), 'First Number should be one');
        G\Assertion::assertEquals(1, Fibonacci::get(2), 'Second Number should be one');
    }

    public function testNextNumbers()
    {
        G\Assertion::assertEquals(2, Fibonacci::get(3), 'First Number should be one');
        G\Assertion::assertEquals(3, Fibonacci::get(4), 'Second Number should be one');
        G\Assertion::assertEquals(5, Fibonacci::get(5), 'Second Number should be one');
        G\Assertion::assertEquals(8, Fibonacci::get(6), 'Second Number should be one');
    }
}
