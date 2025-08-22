<?php

require_once(__DIR__.'/../model.php');

class Lugar extends Model{

  function crear($datos){
    if(isset($_POST['enviar'])){
      $this->conectar();
      $this->conexion->beginTransaction();

      if(isset($datos['lugar'], $datos['latitud'], $datos['longitud'], $datos['id_municipio'])){
        
        $datos['lugar'] = trim($datos['lugar']);
        $datos['latitud'] = trim($datos['latitud']);
        $datos['longitud'] = trim($datos['longitud']);

        if(strlen($datos['lugar']) > 100){
          return false;
        }

        if(!$this->validarCoordenadas($datos['latitud'], $datos['longitud'])){
          return false;
        }

        if(!is_numeric($datos['id_municipio'])){
          return false;
        }

        try {
          $sql = "SELECT COUNT(*) as cantidad FROM lugar WHERE lugar = :lugar AND id_municipio = :id_municipio";
          $verificar = $this->conexion->prepare($sql);
          $verificar->bindParam(':lugar', $datos['lugar'], PDO::PARAM_STR);
          $verificar->bindParam(':id_municipio', $datos['id_municipio'], PDO::PARAM_INT);
          $verificar->execute();
          $info = $verificar->fetch(PDO::FETCH_ASSOC);

          if($info['cantidad'] > 0){
            $this->conexion->rollback();
            return false;
          }

          $sql = "INSERT INTO lugar (lugar, latitud, longitud, id_municipio) VALUES (:lugar, :latitud, :longitud, :id_municipio)";
          $insertar = $this->conexion->prepare($sql);
          $insertar->bindParam(':lugar', $datos['lugar'], PDO::PARAM_STR);
          $insertar->bindParam(':latitud', $datos['latitud'], PDO::PARAM_STR);
          $insertar->bindParam(':longitud', $datos['longitud'], PDO::PARAM_STR);
          $insertar->bindParam(':id_municipio', $datos['id_municipio'], PDO::PARAM_INT);

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
    if(!is_numeric($id) || !is_numeric($datos['id_municipio'])){
      return false;
    }

    $datos['lugar'] = trim($datos['lugar']);
    $datos['latitud'] = trim($datos['latitud']);
    $datos['longitud'] = trim($datos['longitud']);

    if(strlen($datos['lugar']) > 100 || !$this->validarCoordenadas($datos['latitud'], $datos['longitud'])){
      return false;
    }

    $this->conectar();
    $this->conexion->beginTransaction();
    try {
      $sql = "SELECT COUNT(*) as cantidad FROM lugar WHERE lugar = :lugar AND id_municipio = :id_municipio AND id_lugar != :id_lugar";
      $verificar = $this->conexion->prepare($sql);
      $verificar->bindParam(':lugar', $datos['lugar'], PDO::PARAM_STR);
      $verificar->bindParam(':id_municipio', $datos['id_municipio'], PDO::PARAM_INT);
      $verificar->bindParam(':id_lugar', $id, PDO::PARAM_INT);
      $verificar->execute();
      $info = $verificar->fetch(PDO::FETCH_ASSOC);

      if($info['cantidad'] > 0){
        $this->conexion->rollback();
        return false;
      }

      $sql = "UPDATE lugar SET lugar = :lugar, latitud = :latitud, longitud = :longitud, id_municipio = :id_municipio WHERE id_lugar = :id_lugar";
      $actualizar = $this->conexion->prepare($sql);
      $actualizar->bindParam(':lugar', $datos['lugar'], PDO::PARAM_STR);
      $actualizar->bindParam(':latitud', $datos['latitud'], PDO::PARAM_STR);
      $actualizar->bindParam(':longitud', $datos['longitud'], PDO::PARAM_STR);
      $actualizar->bindParam(':id_municipio', $datos['id_municipio'], PDO::PARAM_INT);
      $actualizar->bindParam(':id_lugar', $id, PDO::PARAM_INT);
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
      $sql = "DELETE FROM lugar WHERE id_lugar = :id_lugar";
      $eliminar = $this->conexion->prepare($sql);
      $eliminar->bindParam(':id_lugar', $id, PDO::PARAM_INT);
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

  function leer($id_municipio = null){
    $this->conectar();
    $sql = "SELECT lugar.*, municipio.municipio FROM lugar LEFT JOIN municipio ON lugar.id_municipio = municipio.id_municipio ORDER BY lugar";

    if(!is_null($id_municipio) && is_numeric($id_municipio)){
      $sql = "SELECT lugar.*, municipio.municipio FROM lugar LEFT JOIN municipio ON lugar.id_municipio = municipio.id_municipio WHERE municipio.id_municipio = :id_municipio ORDER BY lugar";
    }

    $datos = $this->conexion->prepare($sql);

    if(!is_null($id_municipio) && is_numeric($id_municipio)){
      $datos->bindParam(':id_municipio', $id_municipio, PDO::PARAM_INT);
    }

    $datos->execute();
    return $datos->fetchAll(PDO::FETCH_ASSOC);
  }

  function leeruno($id){
    $this->conectar();
    $datos = $this->conexion->prepare("SELECT lugar.*, municipio.municipio FROM lugar LEFT JOIN municipio ON lugar.id_municipio = municipio.id_municipio WHERE id_lugar = :id_lugar");
    $datos->bindParam(':id_lugar', $id, PDO::PARAM_INT);
    $datos->execute();
    return $datos->fetch(PDO::FETCH_ASSOC);
  }

  private function validarCoordenadas($lat, $lon){
    if(!is_numeric($lat) || !is_numeric($lon)){
      return false;
    }
    $lat = floatval($lat);
    $lon = floatval($lon);
    return ($lat >= -90 && $lat <= 90) && ($lon >= -180 && $lon <= 180);
  }
}
?>
