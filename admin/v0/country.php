<?php
header("Content-type: application/json; charset=utf-8");
require_once(__DIR__."/../models/producto.php");

$web = new  Producto();
 
$action = $_SERVER['REQUEST_METHOD'];
$resonse=json_encode([]);
$id=isset($_GET['id'])?$_GET['id']:null;


switch ($action) {
    case 'DELETE':
        if(!is_null($id)){
            $cantidad=$web->eliminar($id);
            if($cantidad){
                $resultado['cantidad'] = true;
                $resultado['mensaje'] = "Se ELIMINO el PAIS correctamente";
            }
            else{
                $resultado['cantidad'] = false;
                $resultado['mensaje'] = "No se pudo ELIMINO el PAIS";
            }
            $resultado['cantidad']=$cantidad;
            $resultado['mensaje']="PAIS eliminado: MSG_SUCCESS(".$cantidad."):";
            $resonse  =(json_encode($resultado));
        }
        else{
            $resultado['mensaje'] = "Error no se pudo eliminar al PAIS";
        }
        break;
     
    case 'POST':
        if(!is_null($id)){
            $datos=$_POST['datos'];
            $cantidad = $web->modificar($datos, $id);
            if ($cantidad) {
                $resultado['cantidad'] = true;
                $resultado['mensaje'] = "Se ACTUALIZO PAIS correctamente";
            } else {
                $resultado['cantidad'] = false;
                $resultado['mensaje'] = "Error al actualizar el PAIS";
            }
            $resonse  =(json_encode($resultado));
        }
        else{
            $datos=$_POST['datos'];
            $cantidad =$web->crear($datos);
            if ($cantidad) {
                $resultado['cantidad'] = true;
                $resultado['mensaje'] = "Se CREO PAIS correctamente";
            } else {
                $resultado['cantidad'] = false;
                $resultado['mensaje'] = "Error al CREAR el PAIS";
            }
            $resonse  =(json_encode($resultado));

        }
        break;
    
    default:
    case 'GET':
        if(!is_null($id)){
            $ACTORES = $web->leeruno($id);
        }
        else{
            $ACTORES = $web->leer();
        }
        $resonse  =(json_encode($ACTORES));
         
        
}
echo($resonse);
 

?>


