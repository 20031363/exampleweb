<?php
require_once(__DIR__.'/models/empleado.php');
require_once(__DIR__.'/models/curso.php');
$web= new Curso();
$web2=new Empleado();

if(!($web->checar('Admin') || $web->checar('Nutricionista') || $web->checar('Coach') || $web->checar('Doctor') )) {
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
                $alerta['mensaje']='CURSO CREADO CORRECTAMENTE!!';
                $alerta['tipo']='success';
                $producto_a=$web->leer();
                $web->alerta($alerta);      
                require_once(__DIR__.'/../views/curso/index.php');
            }
            else{
                $alerta['mensaje']='OCURRIO UN PROBLEMA NO SE PUDO CREAR EL CURSO!!';
                $alerta['tipo']='danger';
                $web->alerta($alerta);      
                include_once(__DIR__.'/../views/curso/form.php');    
            }
        }
        else{
            include_once(__DIR__.'/../views/curso/form.php');
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
                $alerta['mensaje']='CURSO MODIFICADO CORRECTAMENTE!!';
                $alerta['tipo']='success';
                $producto_a=$web->leer();
                $web->alerta($alerta);      
                require_once(__DIR__.'/../views/curso/index.php');
            }
            else{
                $alerta['mensaje']='ERROR: AL INTENTAR MODIFICAR EL CURSO!!';
                $alerta['tipo']='danger';
                $web->alerta($alerta);
                $producto_a=$web->leer();
                require_once(__DIR__.'/../views/curso/index.php');
                
            }
            
        }
        else{
            $info = $web->leeruno($id);
            include_once(__DIR__.'/../views/curso/form.php'); 
        }
        break;
    case 'eliminar':
        $resultado=$web->eliminar($id);
        if($resultado){
            $alerta['mensaje']='CURSO ELIMINADO CORRECTAMENTE!!';
            $alerta['tipo']='success';
        }
        else{
            $alerta['mensaje']='ERROR: AL INTENTAR ELIMINAR EL curso!! o EXISTEN CURSOS QUE DEPENDEN DE ELLA';
            $alerta['tipo']='danger';          
        }
        $web->alerta($alerta);
        $producto_a=$web->leer();
        require_once(__DIR__.'/../views/curso/index.php');
        break;
    case 'leer':
        default:
        $producto_a=$web->leer();
        require_once(__DIR__.'/../views/curso/index.php');
}
require_once(__DIR__.'/../views/footer.php');

?>