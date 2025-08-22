<?php

require_once(__DIR__.'/../model.php');

class Cita extends Model {

  function crear($datos){
    if(isset($_POST['enviar'])){
      $this->conectar();
      $this->conexion->beginTransaction();

      if(isset($datos['titulo'], $datos['fecha_cita'], $datos['id_lugar'], $datos['id_cliente'], $datos['empleado_id'])){

        $datos['descripcion'] = isset($datos['descripcion']) ? trim($datos['descripcion']) : null;

        if(!is_numeric($datos['id_lugar']) || !is_numeric($datos['id_cliente']) || !is_numeric($datos['empleado_id'])){
          return false;
        }

        try {
          $sql = "INSERT INTO cita (titulo, descripcion, fecha_cita, id_lugar, id_cliente, empleado_id)
                  VALUES (:titulo, :descripcion, :fecha_cita, :id_lugar, :id_cliente, :empleado_id)";
          $insertar = $this->conexion->prepare($sql);
          $insertar->bindParam(':titulo', $datos['titulo'], PDO::PARAM_STR);
          $insertar->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
          $insertar->bindParam(':fecha_cita', $datos['fecha_cita'], PDO::PARAM_STR);
          $insertar->bindParam(':id_lugar', $datos['id_lugar'], PDO::PARAM_INT);
          $insertar->bindParam(':id_cliente', $datos['id_cliente'], PDO::PARAM_INT);
          $insertar->bindParam(':empleado_id', $datos['empleado_id'], PDO::PARAM_INT);

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
  }

  function modificar($datos, $id){
    if(!is_numeric($id)){
      return false;
    }

    $datos['descripcion'] = isset($datos['descripcion']) ? trim($datos['descripcion']) : null;

    if(!is_numeric($datos['id_lugar']) || !is_numeric($datos['id_cliente']) || !is_numeric($datos['empleado_id'])){
      return false;
    }

    $this->conectar();
    $this->conexion->beginTransaction();
    try {
      $sql = "UPDATE cita SET 
                titulo = :titulo,
                descripcion = :descripcion,
                fecha_cita = :fecha_cita,
                id_lugar = :id_lugar,
                id_cliente = :id_cliente,
                empleado_id = :empleado_id
              WHERE id_cita = :id_cita";
      $actualizar = $this->conexion->prepare($sql);
      $actualizar->bindParam(':titulo', $datos['titulo'], PDO::PARAM_STR);
      $actualizar->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
      $actualizar->bindParam(':fecha_cita', $datos['fecha_cita'], PDO::PARAM_STR);
      $actualizar->bindParam(':id_lugar', $datos['id_lugar'], PDO::PARAM_INT);
      $actualizar->bindParam(':id_cliente', $datos['id_cliente'], PDO::PARAM_INT);
      $actualizar->bindParam(':empleado_id', $datos['empleado_id'], PDO::PARAM_INT);
      $actualizar->bindParam(':id_cita', $id, PDO::PARAM_INT);

      $resultado = $actualizar->execute();
      $this->conexion->commit();
      return $resultado;
    } catch(PDOException $e){
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
      $sql = "DELETE FROM cita WHERE id_cita = :id_cita";
      $eliminar = $this->conexion->prepare($sql);
      $eliminar->bindParam(':id_cita', $id, PDO::PARAM_INT);
      $eliminar->execute();
      $cantidad = $eliminar->rowCount();
      $this->conexion->commit();
      return $cantidad;
    } catch(PDOException $e){
      $this->conexion->rollback();
      throw new Exception($e->getMessage());
    }
  }

  function leer($id_cliente = null){
    $this->conectar();
    $sql = "SELECT cita.*, cliente.nombre AS cliente, lugar.lugar AS lugar, empleado.nombre AS empleado
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

  function leeruno($id){
    $this->conectar();
    $datos = $this->conexion->prepare("SELECT * FROM cita WHERE id_cita = :id_cita");
    $datos->bindParam(':id_cita', $id, PDO::PARAM_INT);
    $datos->execute();
    return $datos->fetch(PDO::FETCH_ASSOC);
  }
}
?>
