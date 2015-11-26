<?php

namespace GedasTheEvil\Unit;

class Assertion
{
    public static function assertEquals($expected, $value, $message)
    {
        if ($expected !== $value) {
            $expected = json_encode($expected);
            $value = json_encode($value);
            throw new AssertionFailed("Failed to assert that '$expected' === '$value' " . $message);
        }
    }

    public static function assertLess($expected, $value, $message)
    {
        if ($value >= $expected) {
            $expected = json_encode($expected);
            $value = json_encode($value);
            throw new AssertionFailed("Failed to assert that '$expected' < '$value' " . $message);
        }
    }

    public static function assertTrue($value, $message)
    {
        self::assertEquals(true, $value, $message);
    }
}
