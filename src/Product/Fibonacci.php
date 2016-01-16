<?php

namespace GedasTheEvil\Product;

use GedasTheEvil\Profiler\Profiler;

class Fibonacci
{
    private static $valueCache = [0, 1, 1];

    /**
     * Should Return the N-th Fibonacci number
     *
     * @param $n
     *
     * @return int
     */
    public static function get($n)
    {
        Profiler::start(__METHOD__);

        if (isset(self::$valueCache[$n])) {
            Profiler::end(__METHOD__);
            return self::$valueCache[$n];
        }

        self::$valueCache[$n] = self::get($n - 1) + self::get($n - 2);
        Profiler::end(__METHOD__);

        return self::$valueCache[$n];
    }
}
