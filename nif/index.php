<?php

require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$dni = $_POST['dni'];

// $dni = '51520753V';
$validacion = "";

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('logs/logs.txt', Logger::WARNING));

use \NifValidator\NifValidator;

if(NifValidator::isValidDni($dni)){
  $validacion = "El dni $dni es válido";
} else {
  $validacion = "El dni $dni NO es válido";
  // add records to the log
  $log->warning("El dni $dni no es válido.");
}

require_once 'index.html';