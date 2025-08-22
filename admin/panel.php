<?php

require_once(__DIR__.'/models/marca.php');
$web = new Marca();

if(!($web->checar('Nutricionista') || $web->checar('Coach') || $web->checar('Doctor') )) {
    header('Location: /conectatec/index.php'); 
    exit; 
}

$web->conectar();
//$resultado=$web->graficar();
include_once(__DIR__.'/../views/header.php');
include_once(__DIR__.'/../views/panel.php');
include_once(__DIR__.'/../views/footer.php');


?>