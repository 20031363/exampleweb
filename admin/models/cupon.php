<?php

require_once(__DIR__.'/../model.php');

class Cupon extends Model {

  function crear($datos){
    $this->conectar();
    $this->conexion->beginTransaction();

    // Validaciones
    if (!isset($datos['codigo_cupon'], $datos['descuento_porcentaje'], $datos['fecha_inicio'], $datos['fecha_fin'], $datos['usos_maximos'])) {
      return false;
    }

    $datos['codigo_cupon'] = trim($datos['codigo_cupon']);

    if (strlen($datos['codigo_cupon']) > 50 || $datos['descuento_porcentaje'] < 0 || $datos['descuento_porcentaje'] > 100 || $datos['usos_maximos'] < 0) {
      return false;
    }

    try {
      // Verificar cupon duplicado
      $sql = "SELECT codigo_cupon, count(*) as cantidad FROM Cupones_Descuento WHERE codigo_cupon = :codigo GROUP BY codigo_cupon";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindParam(':codigo', $datos['codigo_cupon'], PDO::PARAM_STR);
      $stmt->execute();
      $info = $stmt->fetch(PDO::FETCH_ASSOC);

      if (isset($info['codigo_cupon']) && $info['cantidad'] > 0) {
        $this->conexion->rollback();
        return false;
      }

      // Insertar
      $sql = "INSERT INTO Cupones_Descuento (codigo_cupon, descuento_porcentaje, fecha_inicio, fecha_fin, usos_maximos)
              VALUES (:codigo, :porcentaje, :inicio, :fin, :usos)";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindParam(':codigo', $datos['codigo_cupon'], PDO::PARAM_STR);
      $stmt->bindParam(':porcentaje', $datos['descuento_porcentaje'],PDO::PARAM_INT);
      $stmt->bindParam(':inicio', $datos['fecha_inicio'],PDO::PARAM_STR);
      $stmt->bindParam(':fin', $datos['fecha_fin'],PDO::PARAM_STR);
      $stmt->bindParam(':usos', $datos['usos_maximos'], PDO::PARAM_INT);

      $resultado = $stmt->execute();
      $this->conexion->commit();
      return $resultado;
    } catch(PDOException $e){
      $this->conexion->rollback();
      return false;
    }
  }

  function modificar($datos, $id){
    $this->conectar();
    $this->conexion->beginTransaction();

    $datos['codigo_cupon'] = trim($datos['codigo_cupon']);

    if (!isset($datos['codigo_cupon'], $datos['descuento_porcentaje'], $datos['fecha_inicio'], $datos['fecha_fin'], $datos['usos_maximos'])) {
      return false;
    }

    if (strlen($datos['codigo_cupon']) > 50 || $datos['descuento_porcentaje'] < 0 || $datos['descuento_porcentaje'] > 100 || $datos['usos_maximos'] < 0) {
      return false;
    }

    try {
      // Verificar duplicado
      $sql = "SELECT codigo_cupon, count(*) as cantidad FROM Cupones_Descuento WHERE codigo_cupon = :codigo AND id_cupon != :id GROUP BY codigo_cupon";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindParam(':codigo', $datos['codigo_cupon'], PDO::PARAM_STR);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $info = $stmt->fetch(PDO::FETCH_ASSOC);

      if (isset($info['codigo_cupon'])) {
        $this->conexion->rollback();
        return false;
      }

      // Actualizar
      $sql = "UPDATE Cupones_Descuento SET 
                codigo_cupon = :codigo,
                descuento_porcentaje = :porcentaje,
                fecha_inicio = :inicio,
                fecha_fin = :fin,
                usos_maximos = :usos
              WHERE id_cupon = :id";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindParam(':codigo', $datos['codigo_cupon'], PDO::PARAM_STR);
      $stmt->bindParam(':porcentaje', $datos['descuento_porcentaje'],PDO::PARAM_INT);
      $stmt->bindParam(':inicio', $datos['fecha_inicio'],PDO::PARAM_STR);
      $stmt->bindParam(':fin', $datos['fecha_fin'],PDO::PARAM_STR);
      $stmt->bindParam(':usos', $datos['usos_maximos'], PDO::PARAM_INT);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);

      $resultado = $stmt->execute();
      $this->conexion->commit();
      return $resultado;
    } catch(PDOException $e){
      $this->conexion->rollback();
      return false;
    }
  }

  function eliminar($id){
    $this->conectar();
    $this->conexion->beginTransaction();

    try {
      $sql = "DELETE FROM Cupones_Descuento WHERE id_cupon = :id";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();

      $cantidad = $stmt->rowCount();
      $this->conexion->commit();
      return $cantidad;
    } catch(PDOException $e){
      $this->conexion->rollback();
      return false;
    }
  }

  function leer(){
    $this->conectar();
    $sql = "SELECT * FROM Cupones_Descuento ORDER BY fecha_inicio DESC";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function leeruno($id){
    $this->conectar();
    $sql = "SELECT * FROM Cupones_Descuento WHERE id_cupon = :id";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

}
?>
