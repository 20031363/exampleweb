<?php
require_once(__DIR__.'/models/lugar.php');
require_once(__DIR__.'/models/municipio.php');

$web = new Lugar();
$web2 = new Municipio();

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
        $municipios = $web2->leer();
        if(isset($_POST['enviar'])){
            $datos = $_POST['datos'];
            $resultado = $web->crear($datos);
            if($resultado){
                $alerta['mensaje'] = 'LUGAR CREADO CORRECTAMENTE!!';
                $alerta['tipo'] = 'success';
                $producto_a = $web->leer();
                $web->alerta($alerta);
                require_once(__DIR__.'/../views/lugar/index.php');
            } else {
                $alerta['mensaje'] = 'OCURRIÓ UN PROBLEMA, NO SE PUDO CREAR EL LUGAR!!';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                include_once(__DIR__.'/../views/lugar/form.php');
            }
        } else {
            include_once(__DIR__.'/../views/lugar/form.php');
        }
        break;

    case 'modificar':
        $municipios = $web2->leer();
        if(isset($_POST['enviar'])){
            $id = isset($_GET['id']) ? intval($_GET['id']) : null;
            $datos = $_POST['datos'];
            $resultado = $web->modificar($datos, $id);
            $info = $web->leeruno($id);

            if($resultado){
                $alerta['mensaje'] = 'LUGAR MODIFICADO CORRECTAMENTE!!';
                $alerta['tipo'] = 'success';
                $producto_a = $web->leer();
                $web->alerta($alerta);
                require_once(__DIR__.'/../views/lugar/index.php');
            } else {
                $alerta['mensaje'] = 'ERROR: NO SE PUDO MODIFICAR EL LUGAR!!';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                $producto_a = $web->leer();
                require_once(__DIR__.'/../views/lugar/index.php');
            }
        } else {
            $info = $web->leeruno($id);
            include_once(__DIR__.'/../views/lugar/form.php');
        }
        break;

    case 'eliminar':
        $resultado = $web->eliminar($id);
        if($resultado){
            $alerta['mensaje'] = 'LUGAR ELIMINADO CORRECTAMENTE!!';
            $alerta['tipo'] = 'success';
        } else {
            $alerta['mensaje'] = 'ERROR: NO SE PUDO ELIMINAR EL LUGAR!! O EXISTEN DEPENDENCIAS';
            $alerta['tipo'] = 'danger';
        }
        $web->alerta($alerta);
        $producto_a = $web->leer();
        require_once(__DIR__.'/../views/lugar/index.php');
        break;

    case 'leer':
    default:
        $producto_a = $web->leer();
        require_once(__DIR__.'/../views/lugar/index.php');
        break;
}

require_once(__DIR__.'/../views/footer.php');
?>
