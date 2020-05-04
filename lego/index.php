<?php
require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logInfo = new Logger('legofy');
$logInfo->pushHandler(new StreamHandler('logs/info/infoLogs.txt', Logger::INFO));

$logError = new Logger('legofy');
$logError->pushHandler(new StreamHandler('logs/error/errorLogs.txt', Logger::ERROR));

// The multiplier for the amount of legos on your image, or "legolution" :)
$resolutionMultiplier = $_POST['resolution'];

!$resolutionMultiplier ? $logError->error("No ha elegido ninguna resolución.") : null;

// When set to true it will only use lego colors that exists in real world.
$useLegoPalette = $_POST['legoPalette'] ? true : false;

$legofy = new \RicardoFiorani\Legofy\Legofy();

$source = $_FILES['foto'];

try{
  $output = $legofy->convertToLego($source['tmp_name'], $resolutionMultiplier, $useLegoPalette);
  echo $output->response();
  // $output->save("./images/".$source['name'],$resolutionMultiplier);
  // $logInfo->info("Imagen transformada.");

} catch (Exception $e){

  // $logError->error("Está intentando renderizar un valor nulo, elija una imagen.");
  echo "Debe elegir un archivo.<br>";
}