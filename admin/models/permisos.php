<?php

    require_once(__DIR__.'/../model.php');

    class Permiso extends Model{

      function crear($datos){
        $this->conectar();
        $this->conexion->beginTransaction();

        if(isset($datos['permiso'])){
          if(strlen($datos['permiso'])>30){
            return false;
          }
          else{
            $datos['permiso']=trim($datos['permiso']);
          try{
            $sql ="SELECT permiso,count(*) as cantidad from permisos where permiso = :permiso group by permiso";
            $data=$this->conexion->prepare($sql);
            $data->bindParam(':permiso',$datos['permiso'],PDO::PARAM_STR);
            $info=$data->execute();
            $info=$data->fetch(PDO::FETCH_ASSOC);
            if(isset($info['permiso']) && $info['cantidad']>0){
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
          $sql="INSERT INTO permisos (permiso) VALUES (:permiso)";
          $insertar=$this->conexion->prepare($sql);
          $insertar->bindParam(':permiso',$datos['permiso'],PDO::PARAM_STR);
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
        $datos['permiso']=trim($datos['permiso']);
        $this->conectar();
        $this->conexion->beginTransaction();
        try{
          $sql ="SELECT id_permiso,count(*) as cantidad from permisos_rol where id_permiso = :id_permiso group by id_permiso";
          $data=$this->conexion->prepare($sql);
          $data->bindParam(':id_permiso',$id,PDO::PARAM_STR);
          $info=$data->execute();
          $info=$data->fetch(PDO::FETCH_ASSOC);
          if(isset($info['permiso'])){
            $this->conexion->rollback();
            return false;
          }

          $sql="UPDATE permisos SET permiso = :permiso WHERE id_permiso = :id_permiso";
          $actualizar=$this->conexion->prepare($sql);
          $actualizar->bindParam(':permiso',$datos['permiso'],PDO::PARAM_STR);
          $actualizar->bindParam(':id_permiso',$id,PDO::PARAM_INT);
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
          $sql="SELECT count(*) as cantidad from permisos_rol where id_permiso= :id_permiso";
          $datos=$this->conexion->prepare($sql);
          $datos->bindParam(':id_permiso',$id,PDO::PARAM_INT);
          $datos->execute();
          $resultado=$datos->fetch(PDO::FETCH_ASSOC);
          $resultado=$resultado['cantidad'];
          if($resultado>0){
            $this->conexion->rollback();
            return false;
          }
          $sql="DELETE FROM permisos WHERE id_permiso = :id_permiso";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_permiso',$id,PDO::PARAM_INT);
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
        $datos = $this->conexion->prepare("SELECT permisos.id_permiso,permiso,count(permisos_rol.id_permiso) as Roles_Cantidad from permisos
        left join permisos_rol on permisos.id_permiso=permisos_rol.id_permiso group by 1;");
        $datos->execute();
        $resultado=$datos->fetchAll();
        return $resultado;
      }

      function leeruno($id){
        $this->conectar();
        $datos = $this->conexion->prepare("SELECT * FROM permisos WHERE id_permiso = :id_permiso");
        $datos->bindParam(':id_permiso',$id,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
        return $resultado;
      }

    }
?>