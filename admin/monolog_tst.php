<?php
require __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$log = new Logger('conectatec');


$logFile = __DIR__ . '/../logs/app.log';


$log->pushHandler(new StreamHandler($logFile, Logger::DEBUG));


$log->debug("Esto es un mensaje de depuración.");
$log->info("Inicio de sesión exitoso.");
$log->warning("Intento de acceso fallido.");
$log->error("Error crítico en el sistema.");


echo " Log creado correctamente en logs/app.log";
