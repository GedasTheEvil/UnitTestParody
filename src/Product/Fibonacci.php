<?php

namespace GedasTheEvil\Product;

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
        if (isset(self::$valueCache[$n])) {
            return self::$valueCache[$n];
        }

        self::$valueCache[$n] = self::get($n - 1) + self::get($n - 2);

        return self::$valueCache[$n];
    }
}
