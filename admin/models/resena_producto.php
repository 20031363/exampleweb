<?php

require_once(__DIR__.'/../model.php');

class ResenaProducto extends Model {

  function crear($datos){
    if(isset($_POST['enviar'])){
      $this->conectar();
      $this->conexion->beginTransaction();

      if(isset($datos['id_producto'], $datos['id_cliente'], $datos['calificacion'], $datos['fecha_resena'])){

        $datos['comentario'] = isset($datos['comentario']) ? trim($datos['comentario']) : null;
        $datos['calificacion'] = intval($datos['calificacion']);

        if($datos['calificacion'] < 0 || $datos['calificacion'] > 5){
          return false;
        }

        if(!is_numeric($datos['id_producto']) || !is_numeric($datos['id_cliente'])){
          return false;
        }

        try {
          $sql = "INSERT INTO resena_producto (id_producto, id_cliente, calificacion, comentario, fecha_resena)
                  VALUES (:id_producto, :id_cliente, :calificacion, :comentario, :fecha_resena)";
          $insertar = $this->conexion->prepare($sql);
          $insertar->bindParam(':id_producto', $datos['id_producto'], PDO::PARAM_INT);
          $insertar->bindParam(':id_cliente', $datos['id_cliente'], PDO::PARAM_INT);
          $insertar->bindParam(':calificacion', $datos['calificacion'], PDO::PARAM_INT);
          $insertar->bindParam(':comentario', $datos['comentario'], PDO::PARAM_STR);
          $insertar->bindParam(':fecha_resena', $datos['fecha_resena'], PDO::PARAM_STR);

          $resultado = $insertar->execute();
          $this->conexion->commit();
          return $resultado;
        }
        catch(PDOException $e){
          $this->conexion->rollback();
          throw new Exception($e->getMessage());
        }
      }

      return false;
    }
  }

  function modificar($datos, $id){
    if(!is_numeric($id)){
      return false;
    }

    $datos['comentario'] = isset($datos['comentario']) ? trim($datos['comentario']) : null;
    $datos['calificacion'] = intval($datos['calificacion']);

    if($datos['calificacion'] < 0 || $datos['calificacion'] > 11){
      return false;
    }

    if(!is_numeric($datos['id_producto']) || !is_numeric($datos['id_cliente'])){
      return false;
    }

    $this->conectar();
    $this->conexion->beginTransaction();
    try {
      $sql = "UPDATE resena_producto SET 
                id_producto = :id_producto,
                id_cliente = :id_cliente,
                calificacion = :calificacion,
                comentario = :comentario,
                fecha_resena = :fecha_resena
              WHERE id_resena = :id_resena";
      $actualizar = $this->conexion->prepare($sql);
      $actualizar->bindParam(':id_producto', $datos['id_producto'], PDO::PARAM_INT);
      $actualizar->bindParam(':id_cliente', $datos['id_cliente'], PDO::PARAM_INT);
      $actualizar->bindParam(':calificacion', $datos['calificacion'], PDO::PARAM_INT);
      $actualizar->bindParam(':comentario', $datos['comentario'], PDO::PARAM_STR);
      $actualizar->bindParam(':fecha_resena', $datos['fecha_resena'], PDO::PARAM_STR);
      $actualizar->bindParam(':id_resena', $id, PDO::PARAM_INT);

      $resultado = $actualizar->execute();
      $this->conexion->commit();
      return $resultado;
    }
    catch(PDOException $e){
      $this->conexion->rollback();
      throw new Exception($e->getMessage());
    }
  }

  function eliminar($id){
    if(!is_numeric($id)){
      return false;
    }

    $this->conectar();
    $this->conexion->beginTransaction();
    try{
      $sql = "DELETE FROM resena_producto WHERE id_resena = :id_resena";
      $eliminar = $this->conexion->prepare($sql);
      $eliminar->bindParam(':id_resena', $id, PDO::PARAM_INT);
      $eliminar->execute();
      $cantidad = $eliminar->rowCount();
      $this->conexion->commit();
      return $cantidad;
    }
    catch(PDOException $e){
      $this->conexion->rollback();
      throw new Exception($e->getMessage());
    }
  }

  function leer($id_producto = null){
    $this->conectar();
    $sql = "SELECT resena_producto.*, cliente.nombre AS cliente, producto.producto AS producto
            FROM resena_producto
            LEFT JOIN cliente ON resena_producto.id_cliente = cliente.id_cliente
            LEFT JOIN producto ON resena_producto.id_producto = producto.id_producto";

    if(!is_null($id_producto) && is_numeric($id_producto)){
      $sql .= " WHERE resena_producto.id_producto = :id_producto";
    }

    $datos = $this->conexion->prepare($sql);

    if(!is_null($id_producto) && is_numeric($id_producto)){
      $datos->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
    }

    $datos->execute();
    return $datos->fetchAll(PDO::FETCH_ASSOC);
  }

  function leeruno($id){
    $this->conectar();
    $datos = $this->conexion->prepare("SELECT * FROM resena_producto WHERE id_resena = :id_resena");
    $datos->bindParam(':id_resena', $id, PDO::PARAM_INT);
    $datos->execute();
    return $datos->fetch(PDO::FETCH_ASSOC);
  }
}
?>
