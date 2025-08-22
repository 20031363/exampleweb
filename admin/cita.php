<?php 
require_once(__DIR__.'/models/cita.php');
require_once(__DIR__.'/models/lugar.php');
require_once(__DIR__.'/models/cliente.php');
require_once(__DIR__.'/models/empleado.php');

$web = new Cita();
$webLugar = new Lugar();
$webCliente = new Cliente();
$webEmpleado = new Empleado();

if(!($web->checar('Admin') || $web->checar('Nutricionista') || $web->checar('Coach') || $web->checar('Doctor') )) {
    header('Location: /conectatec/index.php'); 
    exit; 
}

$accion = isset($_GET['accion']) ? $_GET['accion'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$alerta = [];

require_once(__DIR__.'/../views/header.php');

switch($accion){
    case 'crear':
        $lugares = $webLugar->leer();
        $clientes = $webCliente->leer();
        $empleados = $webEmpleado->leer();

        if(isset($_POST['enviar'])){
            $datos = $_POST['datos'];

            if (strtotime($datos['fecha_cita']) < strtotime(date('Y-m-d H:i:s'))) {
                $alerta['mensaje'] = 'Error: La fecha de la cita no puede ser en el pasado.';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                include_once(__DIR__.'/../views/cita/form.php');
                break;
            }

            $resultado = $web->crear($datos);
            if($resultado){
                $alerta['mensaje'] = 'CITA CREADA CORRECTAMENTE!!';
                $alerta['tipo'] = 'success';
                $citas = $web->leer();
                $web->alerta($alerta);
                require_once(__DIR__.'/../views/cita/index.php');
            } else {
                $alerta['mensaje'] = 'OCURRIÓ UN PROBLEMA, NO SE PUDO CREAR LA CITA!!';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                include_once(__DIR__.'/../views/cita/form.php');
            }
        } else {
            include_once(__DIR__.'/../views/cita/form.php');
        }
        break;

    case 'modificar':
        $lugares = $webLugar->leer();
        $clientes = $webCliente->leer();
        $empleados = $webEmpleado->leer();

        if(isset($_POST['enviar'])){
            $datos = $_POST['datos'];
            $id = intval($_GET['id']);

            if (strtotime($datos['fecha_cita']) < strtotime(date('Y-m-d H:i:s'))) {
                $alerta['mensaje'] = 'Error: La fecha de la cita no puede ser en el pasado.';
                $alerta['tipo'] = 'danger';
                $citas = $web->leer();
                $web->alerta($alerta);
                include_once(__DIR__.'/../views/cita/form.php');
                break;
            }

            $resultado = $web->modificar($datos, $id);
            $info = $web->leeruno($id);

            if($resultado){
                $alerta['mensaje'] = 'CITA MODIFICADA CORRECTAMENTE!!';
                $alerta['tipo'] = 'success';
                $citas = $web->leer();
                $web->alerta($alerta);
                require_once(__DIR__.'/../views/cita/index.php');
            } else {
                $alerta['mensaje'] = 'ERROR: NO SE PUDO MODIFICAR LA CITA!!';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                require_once(__DIR__.'/../views/cita/index.php');
            }
        } else {
            $info = $web->leeruno($id);
            include_once(__DIR__.'/../views/cita/form.php');
        }
        break;

    case 'eliminar':
        $resultado = $web->eliminar($id);
        if($resultado){
            $alerta['mensaje'] = 'CITA ELIMINADA CORRECTAMENTE!!';
            $alerta['tipo'] = 'success';
        } else {
            $alerta['mensaje'] = 'ERROR: NO SE PUDO ELIMINAR LA CITA!! O EXISTEN DEPENDENCIAS';
            $alerta['tipo'] = 'danger';
        }
        $web->alerta($alerta);
        $citas = $web->leer();
        require_once(__DIR__.'/../views/cita/index.php');
        break;

    case 'leer':
    default:
        $citas = $web->leer();
        require_once(__DIR__.'/../views/cita/index.php');
        break;
}

require_once(__DIR__.'/../views/footer.php');
