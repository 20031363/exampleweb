<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cantidadx'], $_POST['productosx'], $_POST['preciosx'], $_POST['fotografiasx'])) {
        foreach ($_POST['cantidadx'] as $id_producto => $cantidad) {
            $cantidad = intval($cantidad);

            if ($cantidad > 0 &&
                isset($_POST['productosx'][$id_producto], $_POST['preciosx'][$id_producto], $_POST['fotografiasx'][$id_producto])
            ) {
                $nombre_producto = htmlspecialchars($_POST['productosx'][$id_producto]);
                $precio_producto = floatval($_POST['preciosx'][$id_producto]);
                $imagen_producto = htmlspecialchars($_POST['fotografiasx'][$id_producto]);



              
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$producto_existente = false;


foreach ($_SESSION['carrito'] as &$item) {
    if ($item['id'] == $id_producto) {
        $item['cantidad'] += $cantidad;
        $producto_existente = true;
        break;
    }
}
unset($item); 


if (!$producto_existente) {
    $_SESSION['carrito'][] = [
        'id' => $id_producto,
        'cantidad' => $cantidad,
        'nombre' => $nombre_producto,
        'precio' => $precio_producto,
        'imagen' => $imagen_producto
    ];
}




            }
        }
    }
}

header("Location: biblioteca.php?mensaje=agregado");
exit;
