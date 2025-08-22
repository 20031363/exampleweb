<?php
require_once(__DIR__.'/models/transaccion_detalle.php');
require_once(__DIR__.'/models/producto.php');
require_once(__DIR__.'/models/transaccion.php');

$web = new TransaccionProducto();
$webProducto = new Producto();
$webTransaccion = new Transaccion();

if (!$web->checar('Admin')) {
    header('Location: /conectatec/index.php');
    exit;
}

$accion = isset($_GET['accion']) ? $_GET['accion'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$id_2 = isset($_GET['id_2']) ? $_GET['id_2'] : null;
$alerta = [];


require_once(__DIR__.'/../views/header.php');

switch($accion){
    case 'crear':
        $productos = $webProducto->leer();
        $transacciones = $webTransaccion->leer();

        if(isset($_POST['enviar'])){
            $datos = $_POST['datos'];
            $resultado = $web->crear($datos);
            if($resultado){
                $alerta['mensaje'] = 'transaccion_detalle CREADA CORRECTAMENTE!!';
                $alerta['tipo'] = 'success';
                $registros = $web->leer();
                $web->alerta($alerta);
                require_once(__DIR__.'/../views/transaccion_detalle/index.php');
            } else {
                $alerta['mensaje'] = 'OCURRIÓ UN PROBLEMA, NO SE PUDO CREAR LA transaccion_detalle!!';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                include_once(__DIR__.'/../views/transaccion_detalle/form.php');
            }
        } else {
            include_once(__DIR__.'/../views/transaccion_detalle/form.php');
        }
        break;

    case 'modificar':
        $productos = $webProducto->leer();
        $transacciones = $webTransaccion->leer();

        if(isset($_POST['enviar'])){
            $datos = $_POST['datos'];
            $id = intval($_GET['id']);

            $id_original = $_POST['id_original'];
            $id2_original = $_POST['id2_original'];

            $resultado = $web->modificar($datos, $id_original, $id2_original);
            $info = $web->leeruno($id,$id_2);

            if($resultado){
                $alerta['mensaje'] = 'transaccion_detalle MODIFICADA CORRECTAMENTE!!';
                $alerta['tipo'] = 'success';
                $registros = $web->leer();
                $web->alerta($alerta);
                require_once(__DIR__.'/../views/transaccion_detalle/index.php');
            } else {
                $alerta['mensaje'] = 'ERROR: NO SE PUDO MODIFICAR LA transaccion_detalle!!';
                $alerta['tipo'] = 'danger';
                $registros = $web->leer();
                $web->alerta($alerta);
                require_once(__DIR__.'/../views/transaccion_detalle/index.php');
            }
        } else {
            $info = $web->leeruno($id,$id_2);
            include_once(__DIR__.'/../views/transaccion_detalle/form.php');
        }
        break;

    case 'eliminar':
        $resultado = $web->eliminar($id,$id_2);
        if($resultado){
            $alerta['mensaje'] = 'transaccion_detalle ELIMINADA CORRECTAMENTE!!';
            $alerta['tipo'] = 'success';
        } else {
            $alerta['mensaje'] = 'ERROR: NO SE PUDO ELIMINAR LA transaccion_detalle!! O EXISTEN DEPENDENCIAS';
            $alerta['tipo'] = 'danger';
        }
        $web->alerta($alerta);
        $registros = $web->leer();
        require_once(__DIR__.'/../views/transaccion_detalle/index.php');
        break;

    case 'leer':
    default:
        $registros = $web->leer();
        require_once(__DIR__.'/../views/transaccion_detalle/index.php');
        break;
}

require_once(__DIR__.'/../views/footer.php');
