<?php
require_once(__DIR__.'/models/resena_curso.php');
require_once(__DIR__.'/models/curso.php');
require_once(__DIR__.'/models/cliente.php');

$web = new ResenaCurso();
$webProducto = new Curso();
$webCliente = new Cliente();

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
        $productos = $webProducto->leer();
        $clientes = $webCliente->leer();
        if(isset($_POST['enviar'])){
            $datos = $_POST['datos'];

            $hoy = date('Y-m-d');

            if (strtotime($datos['fecha_resena']) >= strtotime($hoy)) {
                $alerta['mensaje'] = 'Error: La fecha de resena no puede ser mayor que hoy.';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                include_once(__DIR__.'/../views/resena_curso/form.php');
                break;
            }

            $datos['fecha_resena'] = date('Y-m-d', strtotime($datos['fecha_resena']));


            $resultado = $web->crear($datos);
            if($resultado){
                $alerta['mensaje'] = 'RESEÑA CREADA CORRECTAMENTE!!';
                $alerta['tipo'] = 'success';
                $producto_a = $web->leer();
                $web->alerta($alerta);
                require_once(__DIR__.'/../views/resena_curso/index.php');
            } else {
                $alerta['mensaje'] = 'OCURRIÓ UN PROBLEMA, NO SE PUDO CREAR LA RESEÑA!!';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                include_once(__DIR__.'/../views/resena_curso/form.php');
            }
        } else {
            include_once(__DIR__.'/../views/resena_curso/form.php');
        }
        break;

    case 'modificar':
        $productos = $webProducto->leer();
        $clientes = $webCliente->leer();
        if(isset($_POST['enviar'])){
            $id = isset($_GET['id']) ? intval($_GET['id']) : null;
            $datos = $_POST['datos'];

            $hoy = date('Y-m-d');

            if (strtotime($datos['fecha_resena']) >= strtotime($hoy)) {
                $alerta['mensaje'] = 'Error: La fecha de resena no puede ser mayor que hoy.';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                $producto_a = $web->leer();
                include_once(__DIR__.'/../views/resena_curso/form.php');
                break;
            }

            $datos['fecha_resena'] = date('Y-m-d', strtotime($datos['fecha_resena']));


            $resultado = $web->modificar($datos, $id);
            $info = $web->leeruno($id);

            if($resultado){
                $alerta['mensaje'] = 'RESEÑA MODIFICADA CORRECTAMENTE!!';
                $alerta['tipo'] = 'success';
                $producto_a = $web->leer();
                $web->alerta($alerta);
                require_once(__DIR__.'/../views/resena_curso/index.php');
            } else {
                $alerta['mensaje'] = 'ERROR: NO SE PUDO MODIFICAR LA RESEÑA!!';
                $alerta['tipo'] = 'danger';
                $web->alerta($alerta);
                $producto_a = $web->leer();
                require_once(__DIR__.'/../views/resena_curso/index.php');
            }
        } else {
            $info = $web->leeruno($id);
            include_once(__DIR__.'/../views/resena_curso/form.php');
        }
        break;

    case 'eliminar':
        $resultado = $web->eliminar($id);
        if($resultado){
            $alerta['mensaje'] = 'RESEÑA ELIMINADA CORRECTAMENTE!!';
            $alerta['tipo'] = 'success';
        } else {
            $alerta['mensaje'] = 'ERROR: NO SE PUDO ELIMINAR LA RESEÑA!! O EXISTEN DEPENDENCIAS';
            $alerta['tipo'] = 'danger';
        }
        $web->alerta($alerta);
        $producto_a = $web->leer();
        require_once(__DIR__.'/../views/resena_curso/index.php');
        break;

    case 'leer':
    default:
        $producto_a = $web->leer();
        require_once(__DIR__.'/../views/resena_curso/index.php');
        break;
}

require_once(__DIR__.'/../views/footer.php');
