<?php

    require_once(__DIR__.'/../model.php');

    class Municipio extends Model{

      function crear($datos){

        if(isset($_POST['enviar'])){
          $this->conectar();
          $this->conexion->beginTransaction();
  
          if(isset($datos['municipio']) && isset($datos['id_estado'])){
            if(strlen($datos['municipio'])>50){
              return false;
            }
            if(!is_numeric($datos['id_estado'])){
                  return false;
            }
            else{
              $datos['municipio']=trim($datos['municipio']);
            try{
              $sql ="SELECT count(*) as cantidad from municipio where municipio = :municipio and id_estado = :id_estado";
              $data=$this->conexion->prepare($sql);
              $data->bindParam(':municipio',$datos['municipio'],PDO::PARAM_STR);
              $data->bindParam(':id_estado',$datos['id_estado'],PDO::PARAM_INT);
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
              
            }
          }
          
          $this->conectar();
          $this->conexion->beginTransaction();
          try{
            $sql="INSERT INTO municipio (municipio,id_estado) VALUES (:municipio,:id_estado)";

            $insertar=$this->conexion->prepare($sql);
            $insertar->bindParam(':municipio',$datos['municipio'],PDO::PARAM_STR);
            $insertar->bindParam(':id_estado',$datos['id_estado'],PDO::PARAM_INT);
            $resultado=$insertar->execute();
            $sql ="SELECT count(*) as cantidad from municipio where municipio = :municipio group by municipio";
            $verificar=$this->conexion->prepare($sql);
            $verificar->bindParam(':municipio',$datos['municipio'],PDO::PARAM_STR);
            $verificar->execute();
            $resultado=$verificar->fetch(PDO::FETCH_ASSOC);
            if(isset($resultado['municipio'])){
              if(isset($resultado['cantidad'])>0){
                  $this->conexion->rollback();
                  return false;
              }
            }
  

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

        if(!is_numeric($datos['id_estado'])){
          return false;
         }

        $datos['municipio']=trim($datos['municipio']);
        $this->conectar();
        $this->conexion->beginTransaction();
        try{

          $sql ="SELECT count(*) as cantidad FROM municipio WHERE municipio = :municipio AND id_estado = :id_estado AND id_municipio != :id_municipio";
          $data=$this->conexion->prepare($sql);
          $data->bindParam(':municipio',$datos['municipio'],PDO::PARAM_STR);
          $data->bindParam(':id_estado',$datos['id_estado'],PDO::PARAM_INT);
          $data->bindParam(':id_municipio',$id,PDO::PARAM_INT); // agregar exclusión por id actual
          $data->execute();
          $info=$data->fetch(PDO::FETCH_ASSOC);
          
          if($info['cantidad']>0){
              $this->conexion->rollback();
              return false;
          }
          

          $sql="UPDATE municipio SET municipio = :municipio,id_estado=:id_estado WHERE id_municipio = :id_municipio";

          $actualizar=$this->conexion->prepare($sql);
          $actualizar->bindParam(':id_municipio',$id,PDO::PARAM_INT);
          $actualizar->bindParam(':municipio',$datos['municipio'],PDO::PARAM_STR);
          $actualizar->bindParam(':id_estado',$datos['id_estado'],PDO::PARAM_INT);

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
        if(!is_numeric($id)){
            return false;
        }

        $this->conectar();
        $this->conexion->beginTransaction();
        $cantidad=0;
        try{
          $sql="DELETE FROM municipio WHERE id_municipio = :id_municipio";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_municipio',$id,PDO::PARAM_INT);
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

      function leer($id_marca=null){

        $this->conectar();
        $sql = "SELECT municipio.* ,estado.estado from municipio left join estado on municipio.id_estado=estado.id_estado order by municipio"; 

        if(!is_null($id_marca)){
          if(is_numeric($id_marca)){
            $sql = "SELECT municipio.* ,estado.estado from municipio left join estado on municipio.id_estado=estado.id_estado where estado.id_estado=:id_estado order by municipio"; 
          }
        }

        $datos = $this->conexion->prepare($sql); 

        if(!is_null($id_marca)){
          if(is_numeric($id_marca)){
            $datos->bindParam(':id_estado',$id_marca,PDO::PARAM_INT);
          }
        }

        $datos->execute();
        $resultado=$datos->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
      }

      function leeruno($id){
        $this->conectar();
        $datos = $this->conexion->prepare("SELECT  municipio.* ,estado.estado from municipio left join estado on municipio.id_estado=estado.id_estado WHERE id_municipio = :id_municipio");
        $datos->bindParam(':id_municipio',$id,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
        return $resultado;
      }

    }
?>