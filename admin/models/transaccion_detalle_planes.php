<?php

require_once(__DIR__.'/../model.php');

class TransaccionPlan extends Model {

  function crear($datos){
    
      $this->conectar();
      $this->conexion->beginTransaction();

      if(isset($datos['id_plan'], $datos['cantidad'], $datos['id_transaccion'])){

        if(!is_numeric($datos['id_plan']) || !is_numeric($datos['id_transaccion']) || !is_numeric($datos['cantidad']) || $datos['cantidad']<1){
          return false;
        }

        try {


        $verificar = $this->conexion->prepare("
          SELECT COUNT(*) FROM transaccion_detalle_planes 
          WHERE id_transaccion = :id_transaccion AND id_plan = :id_plan
        ");

        $verificar->execute([
          ':id_transaccion' => $datos['id_transaccion'],
          ':id_plan' => $datos['id_plan']
        ]);

        if ($verificar->fetchColumn() > 0) {
          $this->conexion->rollback();
          return false;
        }



          $sql = "INSERT INTO transaccion_detalle_planes (id_transaccion, id_plan, cantidad)
                  VALUES (:id_transaccion, :id_plan, :cantidad)";
          $insertar = $this->conexion->prepare($sql);
          $insertar->bindParam(':id_transaccion', $datos['id_transaccion'], PDO::PARAM_INT);
          $insertar->bindParam(':id_plan', $datos['id_plan'], PDO::PARAM_INT);
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

    if(!is_numeric($datos['id_transaccion']) || !is_numeric($datos['id_plan']) || !is_numeric($datos['cantidad'])  || $datos['cantidad']<1){
      return false;
    }

    $this->conectar();
    $this->conexion->beginTransaction();
    try {


      $verificar = $this->conexion->prepare("
      SELECT COUNT(*) FROM transaccion_detalle_planes 
      WHERE id_transaccion = :id_transaccion AND id_plan = :id_plan
    ");

      $verificar->execute([
        ':id_transaccion' => $datos['id_transaccion'],
        ':id_plan' => $datos['id_plan']
      ]);

      if ($verificar->fetchColumn() > 0) {
        $this->conexion->rollback();
        return false;
      }


      $sql = "UPDATE transaccion_detalle_planes SET 
                id_transaccion = :id_transaccion,
                id_plan = :id_plan,
                cantidad = :cantidad
              WHERE id_transaccion = :id AND id_plan = :id_2";
      $actualizar = $this->conexion->prepare($sql);
      $actualizar->bindParam(':id_transaccion', $datos['id_transaccion'], PDO::PARAM_INT);
      $actualizar->bindParam(':id_plan', $datos['id_plan'], PDO::PARAM_INT);
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
      $sql = "DELETE FROM transaccion_detalle_planes WHERE id_transaccion = :id_transaccion AND id_plan = :id_plan";
      $eliminar = $this->conexion->prepare($sql);
      $eliminar->bindParam(':id_transaccion', $id, PDO::PARAM_INT);
      $eliminar->bindParam(':id_plan', $id_2, PDO::PARAM_INT);
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
    $datos = $this->conexion->prepare("SELECT transaccion_detalle_planes.*,plan_nutricional.nombre_plan,plan_nutricional.precio,empleado.* from transaccion_detalle_planes LEFT JOIN plan_nutricional on transaccion_detalle_planes.id_plan=plan_nutricional.id_plan LEFT JOIN empleado on plan_nutricional.empleado_id = empleado.empleado_id ;");
    $datos->execute();
    $resultado=$datos->fetchAll();
    return $resultado;
  }

  function leer_unico($id){
    $this->conectar();
    $datos = $this->conexion->prepare("SELECT transaccion_detalle_planes.*,plan_nutricional.nombre_plan,plan_nutricional.precio,empleado.* from transaccion_detalle_planes LEFT JOIN plan_nutricional on transaccion_detalle_planes.id_plan=plan_nutricional.id_plan LEFT JOIN empleado on plan_nutricional.empleado_id = empleado.empleado_id WHERE transaccion_detalle_planes.id_transaccion = :id_transaccion;");
    $datos->bindParam(':id_transaccion', $id, PDO::PARAM_INT);
    $datos->execute();
    return $datos->fetchAll(PDO::FETCH_ASSOC);
  }

  function leeruno($id, $id_2){
    $this->conectar();
    $datos = $this->conexion->prepare("SELECT transaccion_detalle_planes.*,plan_nutricional.nombre_plan,plan_nutricional.precio,empleado.* from transaccion_detalle_planes LEFT JOIN plan_nutricional on transaccion_detalle_planes.id_plan=plan_nutricional.id_plan LEFT JOIN empleado on plan_nutricional.empleado_id = empleado.empleado_id  WHERE transaccion_detalle_planes.id_transaccion = :id_transaccion AND transaccion_detalle_planes.id_plan = :id_plan");
    $datos->bindParam(':id_transaccion', $id, PDO::PARAM_INT);
    $datos->bindParam(':id_plan', $id_2, PDO::PARAM_INT);
    $datos->execute();
    return $datos->fetch(PDO::FETCH_ASSOC);
  }
}
?>
