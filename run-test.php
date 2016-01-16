<?php

require_once('autoload.php');
include('static/top.php');

try {
    $test = new GedasTheEvil\Product\FibonacciTest();
    $test->runTests();
    ?>
    <div class="box">All <?= $test->getTestsTotal(); ?> tests Pass!</div>
    <?php
} catch (\GedasTheEvil\Unit\AssertionFailed $e) {
    ?>
    <pre class="box fail">
        Passed <?= $test->getTestsPassed() ?> out of <?= $test->getTestsTotal() ?> and
        failed in <?= $test->getLastTest() ?> with "<?= $e->getMessage(); ?>"
    </pre>
    <?php
}
include('static/bottom.php');
