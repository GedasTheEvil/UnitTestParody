<?php

namespace GedasTheEvil\Product;

use GedasTheEvil\Unit as G;

class FibonacciTest extends G\BaseTest
{
    public function testFistNumber()
    {
        G\Assertion::assertEquals(1, Fibonacci::get(1), 'First Number should be one');
        G\Assertion::assertEquals(1, Fibonacci::get(2), 'Second Number should be one');
    }

    public function testNextNumbers()
    {
        G\Assertion::assertEquals(2, Fibonacci::get(3), '#3 Number should be Two');
        G\Assertion::assertEquals(3, Fibonacci::get(4), '#4 Number should be Three');
        G\Assertion::assertEquals(5, Fibonacci::get(5), '#5 Number should be Five');
        G\Assertion::assertEquals(8, Fibonacci::get(6), '#6 Number should be Eight');
    }

    public function testRunsFast()
    {
        $start = microtime(true);
        $fib = Fibonacci::get(30);
        $end = microtime(true) - $start;

        G\Assertion::assertEquals(832040, $fib, 'The Fibonacci should still produce the correct answer');
        G\Assertion::assertLess(0.1, $end, 'The Fibonacci should not take too long');
    }

    public function testsRunVeryFast()
    {
        $start = microtime(true);
        $fib = Fibonacci::get(300);
        $end = microtime(true) - $start;
        $expectedApprox = 2.2223224462942E+62;

        G\Assertion::assertTrue(abs(($fib - $expectedApprox) / $expectedApprox) < 0.001,
            'The Fibonacci should still produce a close to correct answer');
        G\Assertion::assertLess(0.1, $end, 'The Fibonacci should not take too long');
    }
}
