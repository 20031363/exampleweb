<?php

    require_once(__DIR__.'/../model.php');

    class Usuario extends Model{

      function crear($datos){
        $this->conectar();
        $this->conexion->beginTransaction();

        if(isset($datos['correo'])){
          if(strlen($datos['correo'])>30){
            return false;
          }
          else{
            $datos['correo']=trim($datos['correo']);
          try{
            $sql ="SELECT correo,count(*) as cantidad from usuario where correo = :correo group by id_usuario";
            $data=$this->conexion->prepare($sql);
            $data->bindParam(':correo',$datos['correo'],PDO::PARAM_STR);
            $info=$data->execute();
            $info=$data->fetch(PDO::FETCH_ASSOC);
            if(isset($info['correo']) && $info['cantidad']>0){
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
          $sql="INSERT INTO usuario (correo,contrasena) VALUES (:correo,:contrasena)";
          $insertar=$this->conexion->prepare($sql);
          $insertar->bindParam(':correo',$datos['correo'],PDO::PARAM_STR);
          $insertar->bindParam(':contrasena',$datos['contrasena'],PDO::PARAM_STR);
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
        $datos['correo']=trim($datos['correo']);
        $this->conectar();
        $this->conexion->beginTransaction();
        try{
          $sql ="SELECT correo,count(*) as cantidad from usuario where correo = :correo group by correo";
          $data=$this->conexion->prepare($sql);
          $data->bindParam(':correo',$datos['correo'],PDO::PARAM_STR);
          $info=$data->execute();
          $info=$data->fetch(PDO::FETCH_ASSOC);
          if(isset($info['correo'])){
            $this->conexion->rollback();
            return false;
          }

          $sql="UPDATE usuario SET correo =:correo, contrasena = :contrasena WHERE id_usuario = :id_usuario";
          $actualizar=$this->conexion->prepare($sql);
          $actualizar->bindParam(':id_usuario',$id,PDO::PARAM_INT);
          $actualizar->bindParam(':correo',$datos['correo'],PDO::PARAM_STR);
          $actualizar->bindParam(':contrasena',$datos['contrasena'],PDO::PARAM_STR);
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
          $sql="SELECT count(*) as cantidad from usuario_rol where id_usuario= :id_usuario";
          $datos=$this->conexion->prepare($sql);
          $datos->bindParam(':id_usuario',$id,PDO::PARAM_INT);
          $datos->execute();
          $resultado=$datos->fetch(PDO::FETCH_ASSOC);
          $resultado=$resultado['cantidad'];
          if($resultado>0){
            $this->conexion->rollback();
            return false;
          }
          $sql="DELETE FROM usuario WHERE id_usuario = :id_usuario";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_usuario',$id,PDO::PARAM_INT);
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
        $datos = $this->conexion->prepare("SELECT usuario_rol.*,rol.rol,usuario.correo from usuario LEFT JOIN usuario_rol on usuario.id_usuario = usuario_rol.id_usuario LEFT JOIN rol on usuario_rol.id_rol = rol.id_rol ORDER BY id_usuario ASC;");
        $datos->execute();
        $resultado=$datos->fetchAll();
        return $resultado;
      }

      function leeruno($id){
        $this->conectar();
        $datos = $this->conexion->prepare("SELECT * FROM usuario_rol WHERE id_usuario = :id_usuario");
        $datos->bindParam(':id_usuario',$id,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
        return $resultado;
      }

    }
?>