<?php
require_once(__DIR__.'/models/cliente.php');
$web= new Cliente();

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
                $alerta['mensaje']='ELEMENTO CREADO CORRECTAMENTE!!';
                $alerta['tipo']='success';
                $marca_a=$web->leer();
                $web->alerta($alerta);      
                require_once(__DIR__.'/../views/cliente/index.php');
            }
            else{
                $alerta['mensaje']='OCURRIO UN PROBLEMA NO SE PUDO CREAR EL CLIENTE!!';
                $alerta['tipo']='danger';
                $web->alerta($alerta);      
                include_once(__DIR__.'/../views/cliente/form.php');    
            }
        }
        else{
            include_once(__DIR__.'/../views/cliente/form.php');
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
                $marca_a=$web->leer();
                $web->alerta($alerta);      
                require_once(__DIR__.'/../views/cliente/index.php');
            }
            else{
                $alerta['mensaje']='ERROR: AL INTENTAR MODIFICAR EL ELEMENTO!!';
                $alerta['tipo']='danger';
                $web->alerta($alerta);
                $marca_a=$web->leer();
                require_once(__DIR__.'/../views/cliente/index.php');
                
            }
            
        }
        else{
            $info = $web->leeruno($id);
            $extra_info = $web->leerotro($info['id_usuario']);
            include_once(__DIR__.'/../views/cliente/form.php'); 
        }
        break;
    case 'eliminar':
        $resultado=$web->eliminar($id);
        if($resultado){
            $alerta['mensaje']='ELEMENTO ELIMINADO CORRECTAMENTE!!';
            $alerta['tipo']='success';
        }
        else{
            $alerta['mensaje']='ERROR: AL INTENTAR ELIMINAR EL ELEMENTO!! o EXISTEN ELEMENTOS QUE DEPENDEN DE ELLA';
            $alerta['tipo']='danger';          
        }
        $web->alerta($alerta);
        $marca_a=$web->leer();
        require_once(__DIR__.'/../views/cliente/index.php');
        break;
    case 'leer':
        default:
        $marca_a=$web->leer();
        require_once(__DIR__.'/../views/cliente/index.php');
}
require_once(__DIR__.'/../views/footer.php');

?>