<?php 
require_once(__DIR__.'/model.php');
require_once(__DIR__ . '/config.php');
$app = new Model();

if(!($app->checar('Nutricionista') || $app->checar('Coach') || $app->checar('Doctor') )) {
    header('Location: /conectatec/index.php'); 
    exit; 
}

session_start();

$model = new Model();
$model->conectar();
$pdo = $model->conexion;

if (!isset($_GET['id'])) {
    die("ID de cita no recibido.");
}

$id_cita = $_GET['id'];

// Eliminar cita
$stmt = $pdo->prepare("DELETE FROM cita WHERE id_cita = ?");
$stmt->execute([$id_cita]);

header("Location: panel.php?msg=cita_eliminada");
exit;



?>


