<?php
require_once('autoload.php');
include('static/top.php');

use \GedasTheEvil\Profiler\Profiler;
use \GedasTheEvil\Product\FibonacciNonOptimized;

$test = basename(__FILE__);
Profiler::start($test);

FibonacciNonOptimized::get(30);

Profiler::end($test);
echo Profiler::getHtmlReportContent();

include('static/bottom.php');
