<?php
header("Content-type: application/json; charset=utf-8");
require_once(__DIR__."/../models/marca.php");
require_once(__DIR__."/../models/producto.php");

$web = new Marca();
$web2 = new Producto();

 
$action = $_SERVER['REQUEST_METHOD'];
$resonse=json_encode([]);
$id=isset($_GET['id'])?$_GET['id']:null;
switch ($action) {
    case 'DELETE':
        if(!is_null($id)){
            $cantidad=$web2->eliminar($id);
            $resultado['cantidad']=$cantidad;
            $resultado['mensaje']="Producto eliminado cant-".$cantidad." produtos";
            $resonse  =(json_encode($resultado));
        }
        else{
            
        }
        break;
     
    case 'POST':
        if(!is_null($id)){
            $datos=$_POST['datos'];
            $cantidad = $web2->modificar($datos, $id);
            if ($cantidad) {
                $resultado['cantidad'] = true;
                $resultado['mensaje'] = "Se ACTUALIZO Producto correctamente";
            } else {
                $resultado['cantidad'] = false;
                $resultado['mensaje'] = "Error al actualizar el producto";
            }
            $resonse  =(json_encode($resultado));
        }
        else{
            $datos=$_POST['datos'];
            $cantidad =$web2->crear($datos);
            if ($cantidad) {
                $resultado['cantidad'] = true;
                $resultado['mensaje'] = "Se CREO Producto correctamente";
            } else {
                $resultado['cantidad'] = false;
                $resultado['mensaje'] = "Error al CREAR el producto";
            }
            $resonse  =(json_encode($resultado));

        }
        break;
    
    default:
    case 'GET':
        if(!is_null($id)){
            $productos = $web2->leeruno($id);
        }
        else{
            $productos = $web2->leer();
        }
        $resonse  =(json_encode($productos));
         
        
}
echo($resonse);
 

?>


