<?php

namespace GedasTheEvil\Product;

class Fibonacci
{
    /**
     * Should Return the N-th Fibonacci number
     *
     * @param $n
     *
     * @return int
     */
    public static function get($n)
    {
        if ($n < 3) {
            return 1;
        }

        return self::get($n - 1) + self::get($n - 2);
    }
}
