<?php

    require_once(__DIR__.'/../model.php');

    class Producto extends Model{

      function crear($datos){
        $this->conectar();
        $this->conexion->beginTransaction();

        if(isset($datos['country'])){
          if(strlen($datos['country'])>50){
            return false;
          }
          else{
          try{
            $sql ="SELECT * from country";
          }
          catch(PDOException $e){
            $this->conexion->rollback();
            throw new Exception($e->getMessage());
          }
            
          }
        }
        
        $this->conectar();
        $this->conexion->beginTransaction();
        try{
          $sql="INSERT INTO country(country) VALUES (:country)";
          $insertar=$this->conexion->prepare($sql);
          $insertar->bindParam(':country',$datos['country'],PDO::PARAM_STR);
          $resultado=$insertar->execute();
          $this->conexion ->commit();
          return $resultado;
        }
        catch(PDOException $e){
          $this->conexion->rollback();
          throw new Exception($e->getMessage());
        }
        return false;
      }

      function modificar($datos,$id){
        $this->conectar();
        $this->conexion->beginTransaction();
        try{
          $sql ="SELECT * from country";
          if(isset($info['country'])){
            $this->conexion->rollback();
            return false;
          }

          $sql="UPDATE country SET country = :country WHERE  country_id = :country_id";
          $actualizar=$this->conexion->prepare($sql);
          $actualizar->bindParam(':country',$datos['country'],PDO::PARAM_STR);
          $actualizar->bindParam(':country_id',$id,PDO::PARAM_INT);
          $resultado=$actualizar->execute();
          

          $this->conexion->commit();
          return $resultado;
        }
        catch(PDOException $e){
          $this->conexion->rollback();
          throw new Exception($e->getMessage());
        }

      }

      function eliminar($id){


        $this->conectar();
        $this->conexion->beginTransaction();
        $cantidad=0;
        try{
          $sql="DELETE FROM country WHERE country_id = :country_id";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':country_id',$id,PDO::PARAM_INT);
          $eliminar->execute();
          $cantidad= $eliminar->rowCount();
          $this->conexion->commit();
          return $cantidad;
        }
        catch(PDOException $e){
          $this->conexion->rollback();
          throw new Exception($e->getMessage());
        }

      }

      function leer(){

        $this->conectar();
        $datos = $this->conexion->prepare("SELECT country.country_id,country,last_update from country;");
        $datos->execute();
        $resultado=$datos->fetchAll();
        return $resultado;
      }

      function leeruno($id){
        $this->conectar();
        $datos = $this->conexion->prepare("SELECT * FROM country WHERE country_id = :country_id");
        $datos->bindParam(':country_id',$id,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
        return $resultado;
      }
      


    }
?>