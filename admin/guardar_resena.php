<?php
session_start();
require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/model.php');

if (!isset($_SESSION['correo'])) {
    header("Location: login.php");
    exit;
}

$correo = $_SESSION['correo'];
$comentario = $_POST['comentario'] ?? '';
$calificacion = $_POST['calificacion'] ?? '';
$id_curso = $_POST['id_curso'] ?? '';

$model = new Model();
$model->conectar();
$pdo = $model->conexion;

$tipo = $_POST['tipo'] ?? '';
$id = $_POST['id'] ?? '';

if ($comentario && $calificacion && $id && $tipo) {
    $stmt = $pdo->prepare("SELECT cl.id_cliente FROM usuario u JOIN cliente cl ON u.id_usuario = cl.id_usuario WHERE u.correo = ?");
    $stmt->execute([$correo]);
    $id_cliente = $stmt->fetchColumn();

    if ($id_cliente) {
        if ($tipo === 'curso') {
            $stmt = $pdo->prepare("INSERT INTO resena_curso (comentario, calificacion, id_cliente, id_curso, fecha_resena) VALUES (?, ?, ?, ?, CURRENT_DATE())");
        } elseif ($tipo === 'plan') {
            $stmt = $pdo->prepare("INSERT INTO resena_plan (comentario, calificacion, id_cliente, id_plan, fecha_resena) VALUES (?, ?, ?, ?, CURRENT_DATE())");
        }elseif ($tipo === 'producto') {
            $stmt = $pdo->prepare("INSERT INTO resena_producto (comentario, calificacion, id_cliente, id_producto, fecha_resena) VALUES (?, ?, ?, ?, CURRENT_DATE())");
        }
        $stmt->execute([$comentario, $calificacion, $id_cliente, $id]);
    }
}

// Redirigir de nuevo
header("Location: cuenta.php");
exit;
