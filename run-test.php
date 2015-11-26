<!DOCTYPE html>
<html>
<head>
    <style>

        .box {
            background: #43e151;
            border: solid green 4px;
            padding: 8px;
            margin:8px;
        }

        .fail {
            border-color: red;
            background: #df5844;
        }
    </style>
</head>
<body>
    <?php
        require_once('autoload.php');

    try {
        $test = new GedasTheEvil\Product\FibonacciTest();
        $test->runTests();
        ?>
            <div class="box">All <?=$test->getTestsTotal();?> tests Pass!</div>
        <?php
    } catch (\GedasTheEvil\Unit\AssertionFailed $e) {
        ?>
        <div class="box fail">
            Passed <?=$test->getTestsPassed()?> out of <?=$test->getTestsTotal()?> and
            failed with <?$e->getMessage();?>
        </div>
        <?php
    }

    ?>
</body>
</html>