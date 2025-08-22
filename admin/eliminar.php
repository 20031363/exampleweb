<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo']; 
    $id = $_POST['id'];

    if (isset($_SESSION[$tipo])) {
        $_SESSION[$tipo] = array_filter($_SESSION[$tipo], function($item) use ($id) {
            return $item['id'] != $id;
        });
  
        $_SESSION[$tipo] = array_values($_SESSION[$tipo]);
    }

    $_SESSION['mensaje'] = "Producto eliminado con éxito.";
}



header("Location: carrito.php");
exit;
