<?php

require_once(__DIR__.'/../model.php');

class TransaccionProducto extends Model {

  function crear($datos){
    
      $this->conectar();
      $this->conexion->beginTransaction();

      if(isset($datos['id_producto'], $datos['cantidad'], $datos['id_transaccion'])){

        if(!is_numeric($datos['id_producto']) || !is_numeric($datos['id_transaccion']) || !is_numeric($datos['cantidad']) || $datos['cantidad']<1){
          return false;
        }

        try {


        $verificar = $this->conexion->prepare("
          SELECT COUNT(*) FROM transaccion_detalle 
          WHERE id_transaccion = :id_transaccion AND id_producto = :id_producto
        ");

        $verificar->execute([
          ':id_transaccion' => $datos['id_transaccion'],
          ':id_producto' => $datos['id_producto']
        ]);

        if ($verificar->fetchColumn() > 0) {
          $this->conexion->rollback();
          return false;
        }



          $sql = "INSERT INTO transaccion_detalle (id_transaccion, id_producto, cantidad)
                  VALUES (:id_transaccion, :id_producto, :cantidad)";
          $insertar = $this->conexion->prepare($sql);
          $insertar->bindParam(':id_transaccion', $datos['id_transaccion'], PDO::PARAM_INT);
          $insertar->bindParam(':id_producto', $datos['id_producto'], PDO::PARAM_INT);
          $insertar->bindParam(':cantidad', $datos['cantidad'], PDO::PARAM_STR);

          $resultado = $insertar->execute();
          $this->conexion->commit();
          return $resultado;
        } catch(PDOException $e){
          $this->conexion->rollback();
          throw new Exception($e->getMessage());
        }
      }

      return false;
    
  }

  function modificar($datos, $id,$id_2){
    if(!is_numeric($id)){
      return false;
    }

    if(!is_numeric($datos['id_transaccion']) || !is_numeric($datos['id_producto']) || !is_numeric($datos['cantidad'])  || $datos['cantidad']<1){
      return false;
    }

    $this->conectar();
    $this->conexion->beginTransaction();
    try {


      $verificar = $this->conexion->prepare("
      SELECT COUNT(*) FROM transaccion_detalle 
      WHERE id_transaccion = :id_transaccion AND id_producto = :id_producto
      ");

        $verificar->execute([
          ':id_transaccion' => $datos['id_transaccion'],
          ':id_producto' => $datos['id_producto']
        ]);

        if ($verificar->fetchColumn() > 0) {
          $this->conexion->rollback();
          return false;
        }

      $sql = "UPDATE transaccion_detalle SET 
                id_transaccion = :id_transaccion,
                id_producto = :id_producto,
                cantidad = :cantidad
              WHERE id_transaccion = :id AND id_producto = :id_2";
      $actualizar = $this->conexion->prepare($sql);
      $actualizar->bindParam(':id_transaccion', $datos['id_transaccion'], PDO::PARAM_INT);
      $actualizar->bindParam(':id_producto', $datos['id_producto'], PDO::PARAM_INT);
      $actualizar->bindParam(':cantidad', $datos['cantidad'], PDO::PARAM_INT);
      $actualizar->bindParam(':id', $id, PDO::PARAM_INT);
      $actualizar->bindParam(':id_2', $id_2, PDO::PARAM_INT);

      $resultado = $actualizar->execute();
      $this->conexion->commit();
      return $resultado;
    } catch(PDOException $e){
      $this->conexion->rollback();
      throw new Exception($e->getMessage());
    }
  }

  function eliminar($id,$id_2){
    if(!is_numeric($id)){
      return false;
    }

    $this->conectar();
    $this->conexion->beginTransaction();
    try{
      $sql = "DELETE FROM transaccion_detalle WHERE id_transaccion = :id_transaccion AND id_producto = :id_producto";
      $eliminar = $this->conexion->prepare($sql);
      $eliminar->bindParam(':id_transaccion', $id, PDO::PARAM_INT);
      $eliminar->bindParam(':id_producto', $id_2, PDO::PARAM_INT);
      $eliminar->execute();
      $cantidad = $eliminar->rowCount();
      $this->conexion->commit();
      return $cantidad;
    } catch(PDOException $e){
      $this->conexion->rollback();
      throw new Exception($e->getMessage());
    }
  }

  function leerx($id_cliente = null){
    $this->conectar();
    $sql = "SELECT transacion_detalle.*, cliente.nombre AS cliente, lugar.lugar AS lugar, empleado.nombre AS empleado
            FROM cita
            LEFT JOIN cliente ON cita.id_cliente = cliente.id_cliente
            LEFT JOIN lugar ON cita.id_lugar = lugar.id_lugar
            LEFT JOIN empleado ON cita.empleado_id = empleado.empleado_id";

    if(!is_null($id_cliente) && is_numeric($id_cliente)){
      $sql .= " WHERE cita.id_cliente = :id_cliente";
    }

    $datos = $this->conexion->prepare($sql);

    if(!is_null($id_cliente) && is_numeric($id_cliente)){
      $datos->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
    }

    $datos->execute();
    return $datos->fetchAll(PDO::FETCH_ASSOC);
  }


  function leer(){
    $this->conectar();
    $datos = $this->conexion->prepare("SELECT transaccion_detalle.*,producto.producto as nombre,producto.precio,marca.marca from transaccion_detalle LEFT JOIN producto on transaccion_detalle.id_producto=producto.id_producto LEFT JOIN marca on producto.id_marca = marca.id_marca ;");
    $datos->execute();
    $resultado=$datos->fetchAll();
    return $resultado;
  }

  function leer_unico($id){
    $this->conectar();
    $datos = $this->conexion->prepare("SELECT transaccion_detalle.*,producto.producto as nombre,producto.precio,marca.marca from transaccion_detalle LEFT JOIN producto on transaccion_detalle.id_producto=producto.id_producto LEFT JOIN marca on producto.id_marca = marca.id_marca WHERE transaccion_detalle.id_transaccion = :id_transaccion;");
    $datos->bindParam(':id_transaccion', $id, PDO::PARAM_INT);
    $datos->execute();
    return $datos->fetchAll(PDO::FETCH_ASSOC);
  }

  function leeruno($id, $id_2){
    $this->conectar();
    $datos = $this->conexion->prepare("SELECT transaccion_detalle.*,producto.producto as nombre,producto.precio,marca.marca from transaccion_detalle LEFT JOIN producto on transaccion_detalle.id_producto=producto.id_producto LEFT JOIN marca on producto.id_marca = marca.id_marca  WHERE transaccion_detalle.id_transaccion = :id_transaccion AND transaccion_detalle.id_producto = :id_producto");
    $datos->bindParam(':id_transaccion', $id, PDO::PARAM_INT);
    $datos->bindParam(':id_producto', $id_2, PDO::PARAM_INT);
    $datos->execute();
    return $datos->fetch(PDO::FETCH_ASSOC);
  }
}
?>
