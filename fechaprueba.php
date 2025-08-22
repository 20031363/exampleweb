<?php

require __DIR__ . '/vendor/autoload.php';  
use Carbon\Carbon;

$now = Carbon::now();
echo $now; 

$fecha = Carbon::create(2025, 12, 25);
echo $fecha->addDays(5); 


echo $fecha->subMonths(2); 


if ($fecha->isFuture()) {
    echo "La fecha es en el futuro.";
}

$inicio = Carbon::parse('2025-01-01');
$fin = Carbon::parse('2025-06-01');
echo $inicio->diffInDays($fin); 


echo $fin->diffForHumans(); 
?>
