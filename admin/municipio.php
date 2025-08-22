<?php
require_once(__DIR__.'/models/estado.php');
require_once(__DIR__.'/models/municipio.php');
$web= new Municipio();
$web2=new Estado();

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
        $marcas=$web2->leer();
        if(isset($_POST['enviar'])){
            $datos=$_POST['datos'];
            $resultado=$web->crear($datos);
            if($resultado){
                $alerta['mensaje']='MUNICIPIO CREADO CORRECTAMENTE!!';
                $alerta['tipo']='success';
                $producto_a=$web->leer();
                $web->alerta($alerta);      
                require_once(__DIR__.'/../views/municipio/index.php');
            }
            else{
                $alerta['mensaje']='OCURRIO UN PROBLEMA NO SE PUDO CREAR EL MUNICIPIO!!';
                $alerta['tipo']='danger';
                $web->alerta($alerta);      
                include_once(__DIR__.'/../views/municipio/form.php');    
            }
        }
        else{
            include_once(__DIR__.'/../views/municipio/form.php');
        }
        break;
    case 'modificar':
        $marcas=$web2->leer();
        if(isset($_POST['enviar'])){
            $id = isset($_GET['id']) ? intval($_GET['id']) : null;
            $datos=$_POST['datos'];
            $resultado=$web->modificar($datos, $id);
            $info = $web->leeruno($id);

            
            if($resultado){
                $alerta['mensaje']='MUNICIPIO MODIFICADO CORRECTAMENTE!!';
                $alerta['tipo']='success';
                $producto_a=$web->leer();
                $web->alerta($alerta);      
                require_once(__DIR__.'/../views/municipio/index.php');
            }
            else{
                $alerta['mensaje']='ERROR: AL INTENTAR MODIFICAR EL MUNICIPIO!!';
                $alerta['tipo']='danger';
                $web->alerta($alerta);
                $producto_a=$web->leer();
                require_once(__DIR__.'/../views/municipio/index.php');
                
            }
            
        }
        else{
            $info = $web->leeruno($id);
            include_once(__DIR__.'/../views/municipio/form.php'); 
        }
        break;
    case 'eliminar':
        $resultado=$web->eliminar($id);
        if($resultado){
            $alerta['mensaje']='MUNICIPIO ELIMINADO CORRECTAMENTE!!';
            $alerta['tipo']='success';
        }
        else{
            $alerta['mensaje']='ERROR: AL INTENTAR ELIMINAR EL MUNICIPIO!! o EXISTEN estados QUE DEPENDEN DE ELLA';
            $alerta['tipo']='danger';          
        }
        $web->alerta($alerta);
        $producto_a=$web->leer();
        require_once(__DIR__.'/../views/municipio/index.php');
        break;
    case 'leer':
        default:
        $producto_a=$web->leer();
        require_once(__DIR__.'/../views/municipio/index.php');
}
require_once(__DIR__.'/../views/footer.php');

?>