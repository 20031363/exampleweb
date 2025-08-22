<?php
session_start();
$id_plan = isset($_GET['id']) ? $_GET['id'] : null;
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
$precio = isset($_GET['precio']) ? $_GET['precio'] : null;
$imagen = isset($_GET['imagen']) ? $_GET['imagen'] : null;

if ($id_plan && $nombre && $precio && $imagen) {
    if (!isset($_SESSION['planes'])) {
        $_SESSION['planes'] = [];
    }

    $yaExiste = false;
    foreach ($_SESSION['planes'] as $plan) {
        if ($plan['id'] == $id_plan) {
            $yaExiste = true;
            break;
        }
    }

    if (!$yaExiste) {
        $_SESSION['planes'][] = [
            'id' => $id_plan,
            'nombre' => $nombre,
            'precio' => $precio,
            'imagen' => $imagen
        ];
    }
}

header("Location: mentorias.php?mensaje=agregado");
exit;
?>
