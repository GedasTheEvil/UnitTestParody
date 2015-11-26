<?php

namespace GedasTheEvil;

class Assertion
{
    public static function assertEquals($expected, $value, $message)
    {
        if ($expected !== $value) {
            throw new AssertionFailed("Failed to assert that '$expected' === '$value'" . $message);
        }
    }
}
