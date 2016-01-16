<?php

namespace GedasTheEvil\Product;

use GedasTheEvil\Profiler\Profiler;

class FibonacciNonOptimized
{
    public static function get($n)
    {
        Profiler::start(__METHOD__);

        if ($n < 2) {
            Profiler::end(__METHOD__);
            return 1;
        }

        $value = self::get($n - 1) + self::get($n - 2);
        Profiler::end(__METHOD__);

        return $value;
    }
}
