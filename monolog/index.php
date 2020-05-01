<?php

require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('logs/logs.txt', Logger::WARNING));

// add records to the log
$log->warning('Acceso restringido');
$log->error('Error en BBDD');
$log->alert("Hoy es festivo!");
$log->emergency("Esta es una emergecia.");