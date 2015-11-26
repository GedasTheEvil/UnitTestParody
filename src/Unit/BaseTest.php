<?php

namespace GedasTheEvil\Unit;

class BaseTest
{
    private $testsPassed = 0;
    private $testsTotal = 0;

    /**
     * @throws AssertionFailed
     */
    public function runTests()
    {
        $this->testsPassed = 0;

        foreach ($this->getTestList() as $methodName) {
            $this->$methodName();
            ++$this->testsPassed;
        }
    }

    /**
     * @return array
     */
    private function getTestList()
    {
        $result = [];

        foreach(get_class_methods($this) as $methodName) {
            if (strpos($methodName, 'test') === 0) {
                $result[] = $methodName;
            }
        }

        $this->testsTotal = count($result);

        return $result;
    }

    /**
     * @return int
     */
    public function getTestsPassed()
    {
        return $this->testsPassed;
    }

    /**
     * @return int
     */
    public function getTestsTotal()
    {
        return $this->testsTotal;
    }
}
