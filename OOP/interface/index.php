<?php
spl_autoload_register(function ($class)
{include"".$class.".php";});

//Ex 01
$logger = new FileLogger('./log.txt', 'w');
$logger->log('PHP interface is awesome');


//EX 02
$loggers = [
    new FileLogger('./log.txt'),
    new DatabaseLogger()
];

foreach ($loggers as $logger) {
    $logger->log('Log message');
}