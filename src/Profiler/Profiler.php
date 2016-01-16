<?php

namespace GedasTheEvil\Profiler;

/**
 * Class Profiler
 *
 * @package GedasTheEvil\Profiler
 */
class Profiler
{
    private static $profileData = [];

    /**
     * Should be called at the beginning of a method with __METHOD__ as the argument
     *
     * @param string $methodName
     */
    public static function start($methodName)
    {
        if (!isset(self::$profileData[$methodName])) {
            self::$profileData[$methodName] = [
                'times_run' => 0,
                'total_time_taken' => 0,
                'last_start' => 0,
                'method' => $methodName,
            ];
        }

        ++self::$profileData[$methodName]['times_run'];
        self::$profileData[$methodName]['last_start'] = microtime(true);
    }

    /**
     * Should be called before the end or a return of a method with __METHOD__ as the argument
     *
     * @param string $methodName
     */
    public static function end($methodName)
    {
        $runTime = microtime(true) - self::$profileData[$methodName]['last_start'];
        self::$profileData[$methodName]['total_time_taken'] += $runTime;
    }

    /**
     * Simply prints the ugly output
     */
    public static function printReport()
    {
        echo "\n\nProfiler Results:\n";
        /** @noinspection ForgottenDebugOutputInspection */
        print_r(self::$profileData);
    }

    /**
     * Writes a markdown report to file
     *
     * @param string $fileName
     */
    public static function writeReportMD($fileName)
    {
        file_put_contents($fileName, self::getMdReportContent());
        chmod($fileName, 0666);
    }

    /**
     * Generates a report in markdown format
     *
     * @return string
     */
    public static function getMdReportContent()
    {
        $result = "| Method | Times Run | Run Time |\n| ---- | ---- | ---- |\n";

        foreach (self::sortBy('total_time_taken', self::$profileData) as $data) {
            $time = number_format($data['total_time_taken'], 4);
            $result .= "| {$data['method']} | {$data['times_run']} | {$time} s |\n";
        }

        return $result;
    }

    /**
     * Generates a report in Html format
     *
     * @return string
     */
    public static function getHtmlReportContent()
    {
        $result = "\n<table>\n";
        $result .= "\t<tr>\n";
        $result .= "\t\t<th>Method</th>\n";
        $result .= "\t\t<th>Times Run</th>\n";
        $result .= "\t\t<th>Total Run Time</th>\n";
        $result .= "\t\t<th>Average Time Per Run</th>\n";
        $result .= "\t</tr>\n";

        foreach (self::sortBy('total_time_taken', self::$profileData) as $data) {
            $result .= "\t<tr>\n";
            $time = number_format($data['total_time_taken'], 4);
            $averageTime = number_format($data['total_time_taken'] / $data['times_run'], 8);
            $result .= "\t\t<td>{$data['method']}</td>\n";
            $result .= "\t\t<td>{$data['times_run']}</td>\n";
            $result .= "\t\t<td>{$time} s</td>\n";
            $result .= "\t\t<td>{$averageTime} s</td>\n";
            $result .= "\t</tr>\n";
        }

        $result .= "</table>\n";

        return $result;
    }

    /**
     * @param string $filedName
     * @param array $from
     * @param bool $desc
     *
     * @return array
     */
    public static function sortBy($filedName, array $from, $desc = true)
    {
        $temp = [];

        foreach ($from as $value) {
            $key = $value[$filedName];

            if (is_float($key)) {
                $key = (int)(1000000 * $key);
            }

            $temp[$key] [] = $value;
        }

        if ($desc) {
            krsort($temp);
        } else {
            ksort($temp);
        }

        $result = [];

        foreach ($temp as $valueList) {
            foreach ($valueList as $value) {
                $result [] = $value;
            }
        }

        return $result;
    }
}
