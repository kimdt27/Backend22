<?php
spl_autoload_register(function ($class)
{include"".$class.".php";});
$logger = new FileLogger('./log.txt', 'w');
$logger->log('PHP interface is awesome');


$loggers = [
    new FileLogger('./log.txt'),
    new DatabaseLogger()
];

foreach ($loggers as $logger) {
    $logger->log('Log message');
}