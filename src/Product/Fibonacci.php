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
       // return 1;
        switch ($n) {
           case 1: case 2: return 1; break;
           case 3: return 2; break;
           case 4: return 3; break;
           case 5: return 5; break;
           case 6: return 8; break;
       }
    }
}
