<?php

function evil_unit_auto_load ($className) {
    $path = str_ireplace(['\\', 'GedasTheEvil'], ['/', __DIR__ . '/src'], $className) . '.php';
    /** @noinspection PhpIncludeInspection */
    require_once($path);
}

spl_autoload_register('evil_unit_auto_load');
