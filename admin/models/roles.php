<?php

    require_once(__DIR__.'./../model.php');

    class Rol extends Model{

      function crear($datos){
        $this->conectar();
        $this->conexion->beginTransaction();

        if(isset($datos['rol'])){
          if(strlen($datos['rol'])>30){
            return false;
          }
          else{
            $datos['rol']=trim($datos['rol']);
          try{
            $sql ="SELECT rol,count(*) as cantidad from rol where rol = :rol group by rol";
            $data=$this->conexion->prepare($sql);
            $data->bindParam(':rol',$datos['rol'],PDO::PARAM_STR);
            $info=$data->execute();
            $info=$data->fetch(PDO::FETCH_ASSOC);
            if(isset($info['rol']) && $info['cantidad']>0){
              $this->conexion->rollback();
              return false;
            }
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
          $sql="INSERT INTO rol (rol) VALUES (:rol)";
          $insertar=$this->conexion->prepare($sql);
          $insertar->bindParam(':rol',$datos['rol'],PDO::PARAM_STR);
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
        $datos['rol']=trim($datos['rol']);
        $this->conectar();
        $this->conexion->beginTransaction();
        try{
          $sql ="SELECT id_rol,count(*) as cantidad from usuario_rol where id_rol = :id_rol group by id_rol";
          $data=$this->conexion->prepare($sql);
          $data->bindParam(':id_rol',$id,PDO::PARAM_INT);
          $info=$data->execute();
          $info=$data->fetch(PDO::FETCH_ASSOC);
          if(isset($info['rol'])){
            $this->conexion->rollback();
            return false;
          }

          $sql="UPDATE rol SET rol = :rol WHERE id_rol = :id_rol";
          $actualizar=$this->conexion->prepare($sql);
          $actualizar->bindParam(':rol',$datos['rol'],PDO::PARAM_STR);
          $actualizar->bindParam(':id_rol',$id,PDO::PARAM_INT);
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
          $sql="SELECT count(*) as cantidad from usuario_rol where id_rol= :id_rol";
          $datos=$this->conexion->prepare($sql);
          $datos->bindParam(':id_rol',$id,PDO::PARAM_INT);
          $datos->execute();
          $resultado=$datos->fetch(PDO::FETCH_ASSOC);
          $resultado=$resultado['cantidad'];
          if($resultado>0){
            $this->conexion->rollback();
            return false;
          }
          $sql="DELETE FROM rol WHERE id_rol = :id_rol";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_rol',$id,PDO::PARAM_INT);
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
        $datos = $this->conexion->prepare("SELECT rol.id_rol,rol.rol,count(usuario_rol.id_rol) as Activa_UR from rol
        left join usuario_rol on rol.id_rol=usuario_rol.id_rol group by 1;");
        $datos->execute();
        $resultado=$datos->fetchAll();
        return $resultado;
      }

      function leeruno($id){
        $this->conectar();
        $datos = $this->conexion->prepare("SELECT * FROM rol WHERE id_rol = :id_rol");
        $datos->bindParam(':id_rol',$id,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
        return $resultado;
      }

    }
?>