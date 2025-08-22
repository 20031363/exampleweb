<?php
require_once(__DIR__.'/models/estado.php');
$web= new Estado();

if(!$web->checar('Admin')) {
    header('Location: /conectatec/index.php'); 
    exit; 
}


$accion= isset($_GET['accion'])?$_GET['accion']:null;
$id=isset($_GET['id'])?$_GET['id']:null;
$alerta=[];
require_once(__DIR__.'/../views/header.php');

switch($accion){
    case 'crear':
        if(isset($_POST['enviar'])){
            $datos=$_POST['datos'];
            $resultado=$web->crear($datos);
            if($resultado){
                $alerta['mensaje']='ESTADO CREADO CORRECTAMENTE!!';
                $alerta['tipo']='success';
                $estado_a=$web->leer();
                $web->alerta($alerta);      
                require_once(__DIR__.'/../views/estado/index.php');
            }
            else{
                $alerta['mensaje']='OCURRIO UN PROBLEMA NO SE PUDO CREAR EL ESTADO!!';
                $alerta['tipo']='danger';
                $web->alerta($alerta);      
                include_once(__DIR__.'/../views/estado/form.php');    
            }
        }
        else{
            include_once(__DIR__.'/../views/estado/form.php');
        }
        break;
    case 'modificar':
        if(isset($_POST['enviar'])){
            $id = isset($_GET['id']) ? intval($_GET['id']) : null;
            $datos=$_POST['datos'];
            $resultado=$web->modificar($datos, $id);
            $info = $web->leeruno($id);
            
            if($resultado){
                $alerta['mensaje']='ELEMENTO MODIFICADO CORRECTAMENTE!!';
                $alerta['tipo']='success';
                $estado_a=$web->leer();
                $web->alerta($alerta);      
                require_once(__DIR__.'/../views/estado/index.php');
            }
            else{
                $alerta['mensaje']='ERROR: AL INTENTAR MODIFICAR EL ESTADO!!';
                $alerta['tipo']='danger';
                $web->alerta($alerta);
                $estado_a=$web->leer();
                require_once(__DIR__.'/../views/estado/index.php');
                
            }
            
        }
        else{
            $info = $web->leeruno($id);
            include_once(__DIR__.'/../views/estado/form.php'); 
        }
        break;
    case 'eliminar':
        $resultado=$web->eliminar($id);
        if($resultado){
            $alerta['mensaje']='ESTADO ELIMINADO CORRECTAMENTE!!';
            $alerta['tipo']='success';
        }
        else{
            $alerta['mensaje']='ERROR: AL INTENTAR ELIMINAR EL ESTADO!! o EXISTEN PRODUCTOS QUE DEPENDEN DE ELLA';
            $alerta['tipo']='danger';          
        }
        $web->alerta($alerta);
        $estado_a=$web->leer();
        require_once(__DIR__.'/../views/estado/index.php');
        break;
    case 'leer':
        default:
        $estado_a=$web->leer();
        require_once(__DIR__.'/../views/estado/index.php');
}
require_once(__DIR__.'/../views/footer.php');

?>