<?php

    require_once(__DIR__.'./../model.php');

    class Cliente extends Model{

      function crear($datos){
        $this->conectar();
        $this->conexion->beginTransaction();

        if(isset($datos['nombre']) && isset($datos['primer_apellido']) && isset($datos['segundo_apellido']) ){
          
          $datos['correo']=trim($datos['correo']);
          $datos['nombre']=trim($datos['nombre']);
          $datos['primer_apellido']=trim($datos['primer_apellido']);
          $datos['segundo_apellido']=trim($datos['segundo_apellido']);
          
          if(!($this->validar_correo($datos['correo']))){
            return false;
          }
          

          if(!($this->validar_contrasena($datos['contrasena']))){
            return false;
          }

         
          

          if(strlen($datos['nombre'])>50){
            return false;
          }
          if(strlen($datos['primer_apellido'])>50){
            return false;
          }

          if(strlen($datos['segundo_apellido'])>50){
            return false;
          }

          
          try{
            $sql ="SELECT count(*) as cantidad from usuario where correo  = :correo";
            $data=$this->conexion->prepare($sql);
            $data->bindParam(':correo',$datos['correo'],PDO::PARAM_STR);
            $info=$data->execute();
            $info=$data->fetch(PDO::FETCH_ASSOC);
            if($info['cantidad']>0){
              $this->conexion->rollback();
              return false;
            }
          }
          catch(PDOException $e){
            $this->conexion->rollback();
            throw new Exception($e->getMessage());
          }
        
          $this->conectar();
          $this->conexion->beginTransaction();
          try{
            $sql="INSERT INTO usuario (correo,contrasena) VALUES (:correo,:contrasena)";
            $insertar=$this->conexion->prepare($sql);
            $insertar->bindParam(':correo',$datos['correo'],PDO::PARAM_STR);
            $insertar->bindParam(':contrasena',$datos['contrasena'],PDO::PARAM_STR);
            $resultado=$insertar->execute();

            $sql="SELECT * from usuario where correo=:correo";
            $usuario_id = $this->conexion->prepare($sql);
            $usuario_id->bindParam(':correo',$datos['correo'],PDO::PARAM_STR);
            $usuario_id->execute();
            $resultado_id =$usuario_id->fetchAll();

            $id_rol=1;//rol del cliente
            $sql="INSERT INTO usuario_rol (id_usuario,id_rol) VALUES (:id_usuario,:id_rol)";
            $insertar=$this->conexion->prepare($sql);
            $insertar->bindParam(':id_usuario',$resultado_id[0]['id_usuario'],PDO::PARAM_INT);
            $insertar->bindParam(':id_rol',$id_rol,PDO::PARAM_INT);
            $resultado=$insertar->execute();
            

            $sql="INSERT INTO cliente (nombre,primer_apellido,segundo_apellido,id_usuario) VALUES (:nombre,:primer_apellido,:segundo_apellido,:id_usuario)";
            $insertar=$this->conexion->prepare($sql);
            $insertar->bindParam(':nombre',$datos['nombre'],PDO::PARAM_STR);
            $insertar->bindParam(':primer_apellido',$datos['primer_apellido'],PDO::PARAM_STR);
            $insertar->bindParam(':segundo_apellido',$datos['segundo_apellido'],PDO::PARAM_STR);
            $insertar->bindParam(':id_usuario',$resultado_id[0]['id_usuario'],PDO::PARAM_INT);
            $resultado=$insertar->execute();

           
  
  
            $this->conexion ->commit();
            return $resultado;
          }
          catch(PDOException $e){
            $this->conexion->rollback();
            throw new Exception($e->getMessage());
          }
        
        }

        return false;
      }

      function modificar($datos,$id){
        $datos['nombre']=trim($datos['nombre']);
        $datos['primer_apellido']=trim($datos['primer_apellido']);
        $datos['segundo_apellido']=trim($datos['segundo_apellido']);

        
        if(!($this->validar_correo($datos['correo']))){
          return false;
        }
        

        if(!($this->validar_contrasena($datos['contrasena']))){
          return false;
        }

       
        

        if(strlen($datos['nombre'])>50){
          return false;
        }
        if(strlen($datos['primer_apellido'])>50){
          return false;
        }

        if(strlen($datos['segundo_apellido'])>50){
          return false;
        }

        $this->conectar();
        $this->conexion->beginTransaction();

        try{
          $sql ="SELECT count(*) as cantidad from usuario where correo  = :correo AND id_usuario != :id_usuario";
          $data=$this->conexion->prepare($sql);
          $data->bindParam(':correo',$datos['correo'],PDO::PARAM_STR);
          $data->bindParam(':id_usuario',$datos['id_usuario'],PDO::PARAM_INT);
          $info=$data->execute();
          $info=$data->fetch(PDO::FETCH_ASSOC);
          if($info['cantidad']>0){
            $this->conexion->rollback();
            return false;
          }
        }
        catch(PDOException $e){
          $this->conexion->rollback();
          throw new Exception($e->getMessage());
        }
      


        try{
          /*
          $sql ="SELECT id_usuario,count(*) as cantidad from usuario where id_usuario = :id_usuario group by usuario";
          $data=$this->conexion->prepare($sql);
          $data->bindParam(':id_usuario',$datos['id_usuario'],PDO::PARAM_INT);
          $info=$data->execute();
          $info=$data->fetch(PDO::FETCH_ASSOC);
          if(isset($info['empleado'])){
            $this->conexion->rollback();
            return false;
          }
          */


          $sql="UPDATE usuario set correo=:correo,contrasena=:contrasena where id_usuario=:id_usuario";
            $actualizar=$this->conexion->prepare($sql);
            $actualizar->bindParam(':correo',$datos['correo'],PDO::PARAM_STR);
            $actualizar->bindParam(':contrasena',$datos['contrasena'],PDO::PARAM_STR);
            $actualizar->bindParam(':id_usuario',$datos['id_usuario'],PDO::PARAM_INT);
            $resultado=$actualizar->execute();

          $sql="UPDATE cliente SET nombre = :nombre ,primer_apellido = :primer_apellido , segundo_apellido = :segundo_apellido   WHERE id_cliente = :id_cliente";
          $actualizar=$this->conexion->prepare($sql);
          $actualizar->bindParam(':nombre',$datos['nombre'],PDO::PARAM_STR);
          $actualizar->bindParam(':primer_apellido',$datos['primer_apellido'],PDO::PARAM_STR);
          $actualizar->bindParam(':segundo_apellido',$datos['segundo_apellido'],PDO::PARAM_STR);
          $actualizar->bindParam(':id_cliente',$id,PDO::PARAM_INT);
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

          $temp_data = $this->conexion->prepare("SELECT * FROM cliente WHERE id_cliente = :id_cliente");
          $temp_data->bindParam(':id_cliente',$id,PDO::PARAM_INT);
          $temp_data->execute();
          $resultado_eli=$temp_data->fetch(PDO::FETCH_ASSOC);


          $sql="DELETE FROM cliente WHERE id_cliente = :id_cliente";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_cliente',$id,PDO::PARAM_INT);
          $eliminar->execute();
          $cantidad= $eliminar->rowCount();
          


          $sql="DELETE FROM usuario WHERE id_usuario = :id_usuario";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_usuario',$resultado_eli['id_usuario'],PDO::PARAM_INT);
          $eliminar->execute();

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
        $datos = $this->conexion->prepare("SELECT * from cliente");
        $datos->execute();
        $resultado=$datos->fetchAll();
        return $resultado;
      }

      function leeruno($id){
        $this->conectar();
        $datos = $this->conexion->prepare("SELECT * FROM cliente WHERE id_cliente = :id_cliente");
        $datos->bindParam(':id_cliente',$id,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
        return $resultado;
      }

      function leerotro($usuario){
        $this->conectar();
        $datos = $this->conexion->prepare("SELECT * FROM usuario WHERE id_usuario = :id_usuario");
        $datos->bindParam(':id_usuario',$usuario,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
        return $resultado;
      }

    }
?>