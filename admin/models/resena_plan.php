<?php

require_once(__DIR__.'/../model.php');

class ResenaPlan extends Model {

  function crear($datos){
    if(isset($_POST['enviar'])){
      $this->conectar();
      $this->conexion->beginTransaction();

      if(isset($datos['id_plan'], $datos['id_cliente'], $datos['calificacion'], $datos['fecha_resena'])){

        $datos['comentario'] = isset($datos['comentario']) ? trim($datos['comentario']) : null;
        $datos['calificacion'] = intval($datos['calificacion']);

        if($datos['calificacion'] < 0 || $datos['calificacion'] > 5){
          return false;
        }

        if(!is_numeric($datos['id_plan']) || !is_numeric($datos['id_cliente'])){
          return false;
        }

        try {
          $sql = "INSERT INTO resena_plan (id_plan, id_cliente, calificacion, comentario, fecha_resena)
                  VALUES (:id_plan, :id_cliente, :calificacion, :comentario, :fecha_resena)";
          $insertar = $this->conexion->prepare($sql);
          $insertar->bindParam(':id_plan', $datos['id_plan'], PDO::PARAM_INT);
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

    if(!is_numeric($datos['id_plan']) || !is_numeric($datos['id_cliente'])){
      return false;
    }

    $this->conectar();
    $this->conexion->beginTransaction();
    try {
      $sql = "UPDATE resena_plan SET 
                id_plan = :id_plan,
                id_cliente = :id_cliente,
                calificacion = :calificacion,
                comentario = :comentario,
                fecha_resena = :fecha_resena
              WHERE id_resena = :id_resena";
      $actualizar = $this->conexion->prepare($sql);
      $actualizar->bindParam(':id_plan', $datos['id_plan'], PDO::PARAM_INT);
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
      $sql = "DELETE FROM resena_plan WHERE id_resena = :id_resena";
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

  function leer($id_plan = null){
    $this->conectar();
    $sql = "SELECT resena_plan.*, cliente.nombre AS cliente, plan_nutricional.nombre_plan AS nombre_plan
            FROM resena_plan
            LEFT JOIN cliente ON resena_plan.id_cliente = cliente.id_cliente
            LEFT JOIN plan_nutricional ON resena_plan.id_plan = plan_nutricional.id_plan";

    if(!is_null($id_plan) && is_numeric($id_plan)){
      $sql .= " WHERE resena_plan.id_plan = :id_plan";
    }

    $datos = $this->conexion->prepare($sql);

    if(!is_null($id_plan) && is_numeric($id_plan)){
      $datos->bindParam(':id_plan', $id_plan, PDO::PARAM_INT);
    }

    $datos->execute();
    return $datos->fetchAll(PDO::FETCH_ASSOC);
  }

  function leeruno($id){
    $this->conectar();
    $datos = $this->conexion->prepare("SELECT * FROM resena_plan WHERE id_resena = :id_resena");
    $datos->bindParam(':id_resena', $id, PDO::PARAM_INT);
    $datos->execute();
    return $datos->fetch(PDO::FETCH_ASSOC);
  }
}
?>
