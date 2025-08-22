<?php

require_once(__DIR__.'/models/marca.php');
$web = new Marca();

if(!$web->checar('Admin')) {
    header('Location: /conectatec/index.php'); 
    exit; 
}

$web->conectar();
$resultado=$web->graficar();
//$web->checar('Empleado');
include_once(__DIR__.'/../views/header.php');
include_once(__DIR__.'/../views/index.php');
include_once(__DIR__.'/../views/footer.php');


?>