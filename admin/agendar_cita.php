<?php
session_start();
require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/model.php');

if (!isset($_SESSION['correo'])) {
    header("Location: login.php");
    exit;
}

$model = new Model();
$model->conectar();
$pdo = $model->conexion;

$correo = $_SESSION['correo'];

$titulo = $_POST['titulo'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$fecha_cita = $_POST['fecha_cita'] ?? '';
$id_lugar = $_POST['id_lugar'] ?? '';
$empleado_id = $_POST['empleado_id'] ?? '';

if ($titulo && $descripcion && $fecha_cita && $id_lugar && $empleado_id) {

    $stmt = $pdo->prepare("SELECT cl.id_cliente FROM usuario u JOIN cliente cl ON u.id_usuario = cl.id_usuario WHERE u.correo = ?");
    $stmt->execute([$correo]);
    $id_cliente = $stmt->fetchColumn();

    if ($id_cliente) {
        $stmt = $pdo->prepare("
            INSERT INTO cita (titulo, descripcion, fecha_cita, id_lugar, id_cliente, empleado_id)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([$titulo, $descripcion, $fecha_cita, $id_lugar, $id_cliente, $empleado_id]);
    }
}

header("Location: cuenta.php");
exit;
