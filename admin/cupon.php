<?php
require_once(__DIR__.'/models/cupon.php');
$web = new Cupon();
if(!($web->checar('Admin') || $web->checar('Nutricionista') || $web->checar('Coach') || $web->checar('Doctor') )) {
    header('Location: /conectatec/index.php'); 
    exit; 
}
$accion = isset($_GET['accion']) ? $_GET['accion'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$alerta = [];

require_once(__DIR__.'/../views/header.php');

switch ($accion) {
    case 'crear':
        if (isset($_POST['enviar'])) {
            $datos = $_POST['datos'];

            $hoy = date('Y-m-d');

            if (strtotime($datos['fecha_inicio']) < strtotime($hoy)) {
                $alerta['mensaje'] = 'Error: La fecha de inicio no puede ser menor que hoy.';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                include_once(__DIR__.'/../views/cupon/form.php');
                break;
            }

        // Validación de fechas
            if (strtotime($datos['fecha_fin']) <= strtotime($datos['fecha_inicio'])) {
                $alerta['mensaje'] = 'Error: La fecha de fin no puede ser menor que la fecha de inicio.';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                include_once(__DIR__.'/../views/cupon/form.php');
                break;  // Salir del case
            }

            $datos['fecha_inicio'] = date('Y-m-d', strtotime($datos['fecha_inicio']));
            $datos['fecha_fin'] = date('Y-m-d', strtotime($datos['fecha_fin']));

            $resultado = $web->crear($datos);
            if ($resultado) {
                $alerta['mensaje'] = 'CUPÓN CREADO CORRECTAMENTE!!';
                $alerta['tipo'] = 'success';
                $cupones = $web->leer();
                $web->alerta($alerta);
                require_once(__DIR__.'/../views/cupon/index.php');
            } else {
                $alerta['mensaje'] = 'OCURRIÓ UN PROBLEMA AL CREAR EL CUPÓN!!';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                include_once(__DIR__.'/../views/cupon/form.php');
            }
        } else {
            include_once(__DIR__.'/../views/cupon/form.php');
        }
        break;

    case 'modificar':
        if (isset($_POST['enviar'])) {
            $id = isset($_GET['id']) ? intval($_GET['id']) : null;
            $datos = $_POST['datos'];

            $hoy = date('Y-m-d');

            if (strtotime($datos['fecha_inicio']) < strtotime($hoy)) {
                $alerta['mensaje'] = 'Error: La fecha de inicio no puede ser menor que hoy.';
                $alerta['tipo'] = 'danger';
                $info = $web->leeruno($id);
                $web->alerta($alerta);
                include_once(__DIR__.'/../views/cupon/form.php');
                break;
            }

        // Validación de fechas
            if (strtotime($datos['fecha_fin']) <= strtotime($datos['fecha_inicio'])) {
                $alerta['mensaje'] = 'Error: La fecha de fin no puede ser menor que la fecha de inicio.';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                $info = $web->leeruno($id);
                include_once(__DIR__.'/../views/cupon/form.php');
                break;  // Salir del case
            }

            $datos['fecha_inicio'] = date('Y-m-d', strtotime($datos['fecha_inicio']));
            $datos['fecha_fin'] = date('Y-m-d', strtotime($datos['fecha_fin']));

            $resultado = $web->modificar($datos, $id);
            $info = $web->leeruno($id);

            if ($resultado) {
                $alerta['mensaje'] = 'CUPÓN MODIFICADO CORRECTAMENTE!!';
                $alerta['tipo'] = 'success';
                $cupones = $web->leer();
                $web->alerta($alerta);
                require_once(__DIR__.'/../views/cupon/index.php');
            } else {
                $alerta['mensaje'] = 'ERROR: NO SE PUDO MODIFICAR EL CUPÓN!!';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                $cupones = $web->leer();
                require_once(__DIR__.'/../views/cupon/index.php');
            }
        } else {
            $info = $web->leeruno($id);
            include_once(__DIR__.'/../views/cupon/form.php');
        }
        break;

    case 'eliminar':
        $resultado = $web->eliminar($id);
        if ($resultado) {
            $alerta['mensaje'] = 'CUPÓN ELIMINADO CORRECTAMENTE!!';
            $alerta['tipo'] = 'success';
        } else {
            $alerta['mensaje'] = 'ERROR: NO SE PUDO ELIMINAR EL CUPÓN!! o EXISTEN REGISTROS RELACIONADOS';
            $alerta['tipo'] = 'danger';
        }
        $web->alerta($alerta);
        $cupones = $web->leer();
        require_once(__DIR__.'/../views/cupon/index.php');
        break;

    case 'leer':
    default:
        $cupones = $web->leer();
        require_once(__DIR__.'/../views/cupon/index.php');
}

require_once(__DIR__.'/../views/footer.php');
?>
