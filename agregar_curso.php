<?php
session_start();
$id_curso = isset($_GET['id']) ? $_GET['id'] : null;
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
$precio = isset($_GET['precio']) ? $_GET['precio'] : null;
$imagen = isset($_GET['imagen']) ? $_GET['imagen'] : null;

if ($id_curso && $nombre && $precio && $imagen) {
    if (!isset($_SESSION['cursos'])) {
        $_SESSION['cursos'] = [];
    }

    $yaExiste = false;
    foreach ($_SESSION['cursos'] as $plan) {
        if ($plan['id'] == $id_curso) {
            $yaExiste = true;
            break;
        }
    }

    if (!$yaExiste) {
        $_SESSION['cursos'][] = [
            'id' => $id_curso,
            'nombre' => $nombre,
            'precio' => $precio,
            'imagen' => $imagen
        ];
    }
}

header("Location: materias.php?mensaje=agregado");
exit;
?>
