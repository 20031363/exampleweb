<?php

    require_once(__DIR__.'./../model.php');

    class Estado extends Model{

      function crear($datos){
        $this->conectar();
        $this->conexion->beginTransaction();

        if(isset($datos['estado'])){
          if(strlen($datos['estado'])>30){
            return false;
          }
          else{
            $datos['estado']=trim($datos['estado']);
          try{
            $sql ="SELECT estado,count(*) as cantidad from estado where estado = :estado group by estado";
            $data=$this->conexion->prepare($sql);
            $data->bindParam(':estado',$datos['estado'],PDO::PARAM_STR);
            $info=$data->execute();
            $info=$data->fetch(PDO::FETCH_ASSOC);
            if(isset($info['estado']) && $info['cantidad']>0){
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
          $sql="INSERT INTO estado (estado) VALUES (:estado)";
          $insertar=$this->conexion->prepare($sql);
          $insertar->bindParam(':estado',$datos['estado'],PDO::PARAM_STR);
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
        $datos['estado']=trim($datos['estado']);
        $this->conectar();
        $this->conexion->beginTransaction();
        try{
          $sql ="SELECT estado,count(*) as cantidad from estado where estado = :estado group by estado";
          $data=$this->conexion->prepare($sql);
          $data->bindParam(':estado',$datos['estado'],PDO::PARAM_STR);
          $info=$data->execute();
          $info=$data->fetch(PDO::FETCH_ASSOC);
          if(isset($info['estado'])){
            $this->conexion->rollback();
            return false;
          }

          $sql="UPDATE estado SET estado = :estado WHERE id_estado = :id_estado";
          $actualizar=$this->conexion->prepare($sql);
          $actualizar->bindParam(':estado',$datos['estado'],PDO::PARAM_STR);
          $actualizar->bindParam(':id_estado',$id,PDO::PARAM_INT);
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
          $sql="SELECT count(*) as cantidad from municipio where id_estado= :id_estado";
          $datos=$this->conexion->prepare($sql);
          $datos->bindParam(':id_estado',$id,PDO::PARAM_INT);
          $datos->execute();
          $resultado=$datos->fetch(PDO::FETCH_ASSOC);
          $resultado=$resultado['cantidad'];
          if($resultado>0){
            $this->conexion->rollback();
            return false;
          }
          $sql="DELETE FROM estado WHERE id_estado = :id_estado";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_estado',$id,PDO::PARAM_INT);
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
        $datos = $this->conexion->prepare("SELECT estado.id_estado,estado,count(municipio.municipio) as cantidad from estado
        left join municipio on estado.id_estado=municipio.id_estado group by 1;");
        $datos->execute();
        $resultado=$datos->fetchAll();
        return $resultado;
      }

      function leeruno($id){
        $this->conectar();
        $datos = $this->conexion->prepare("SELECT * FROM estado WHERE id_estado = :id_estado");
        $datos->bindParam(':id_estado',$id,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
        return $resultado;
      }

    }
?>