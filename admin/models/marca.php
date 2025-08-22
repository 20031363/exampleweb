<?php

    require_once(__DIR__.'/../model.php');

    class Marca extends Model{

      function crear($datos){
        $this->conectar();
        $this->conexion->beginTransaction();

        if(isset($datos['first_name'])){
          if(strlen($datos['first_name'])>30){
            return false;
          }
          else{
          try{
            $sql ="SELECT * from actor";
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
          $sql="INSERT INTO actor(first_name,last_name) VALUES (:first_name,:last_name)";
          $insertar=$this->conexion->prepare($sql);
          $insertar->bindParam(':first_name',$datos['first_name'],PDO::PARAM_STR);
          $insertar->bindParam(':last_name',$datos['last_name'],PDO::PARAM_STR);
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
          $sql ="SELECT * from actor";
          if(isset($info['marca'])){
            $this->conexion->rollback();
            return false;
          }

          $sql="UPDATE actor SET first_name = :first_name , last_name = :last_name WHERE  actor_id = :actor_id";
          $actualizar=$this->conexion->prepare($sql);
          $actualizar->bindParam(':first_name',$datos['first_name'],PDO::PARAM_STR);
          $actualizar->bindParam(':last_name',$datos['last_name'],PDO::PARAM_STR);
          $actualizar->bindParam(':actor_id',$id,PDO::PARAM_INT);
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
          $sql="SELECT * from actor";
          }
          $sql="DELETE FROM actor WHERE actor_id = :actor_id";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':actor_id',$id,PDO::PARAM_INT);
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
        $datos = $this->conexion->prepare("SELECT actor.actor_id,first_name,last_name,last_update from actor;");
        $datos->execute();
        $resultado=$datos->fetchAll();
        return $resultado;
      }

      function leeruno($id){
        $this->conectar();
        $datos = $this->conexion->prepare("SELECT * FROM actor WHERE actor_id = :actor_id");
        $datos->bindParam(':actor_id',$id,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
        return $resultado;
      }

      function graficar(){
        $this->conectar();
        $datos=$this->conexion->prepare("SELECT m.marca,COUNT(p.producto) AS cantidad FROM marca m
        LEFT JOIN producto p ON m.id_marca = p.id_marca
        GROUP BY m.id_marca
        ORDER BY 1;");
        $datos->execute();
        $resultado=$datos->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
      }


      function graficar2(){
        $this->conectar();
        $datos=$this->conexion->prepare("SELECT m.id_marca,m.marca,COUNT(p.producto) AS cantidad FROM marca m
        LEFT JOIN producto p ON m.id_marca = p.id_marca
        GROUP BY m.id_marca
        ORDER BY 1;");
        $datos->execute();
        $resultado=$datos->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
      }


    }
?>