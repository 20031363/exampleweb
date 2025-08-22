<?php

    require_once(__DIR__.'/../model.php');

    class Producto extends Model{

      function crear($datos){

        if(isset($_POST['enviar'])){
          $this->conectar();
          $this->conexion->beginTransaction();
  
          if(isset($datos['producto']) && isset($datos['precio'])&& isset($datos['id_marca'])){
            if(strlen($datos['producto'])>50){
              return false;
            }
            if(!is_numeric($datos['precio']) or !is_numeric($datos['id_marca'])){
                  return false;
            }
            if($datos['precio']>100000000 or $datos['precio']<0){
              return false;
            }  
            else{
              $datos['producto']=trim($datos['producto']);
            try{
              $sql ="SELECT count(*) as cantidad from producto where producto = :producto and id_marca = :id_marca";
              $data=$this->conexion->prepare($sql);
              $data->bindParam(':producto',$datos['producto'],PDO::PARAM_STR);
              $data->bindParam(':id_marca',$datos['id_marca'],PDO::PARAM_INT);
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
            $imagen= $this->cargar_imagen();
            if($imagen){
              $sql="INSERT INTO producto (producto,precio,id_marca,fotografia,descripcion) VALUES (:producto,:precio,:id_marca,:fotografia,:descripcion)";
            }
            else{
              $sql="INSERT INTO producto (producto,precio,id_marca,descripcion) VALUES (:producto,:precio,:id_marca,:descripcion)";
            }
            $insertar=$this->conexion->prepare($sql);
            $insertar->bindParam(':producto',$datos['producto'],PDO::PARAM_STR);
            $insertar->bindParam(':precio',$datos['precio'],PDO::PARAM_STR);
            $insertar->bindParam(':id_marca',$datos['id_marca'],PDO::PARAM_INT);
            if($imagen){
               $insertar->bindParam(':fotografia',$imagen,PDO::PARAM_STR);
               $insertar->bindParam(':descripcion',$datos['descripcion'],PDO::PARAM_STR);
            }
            else{
              $insertar->bindParam(':descripcion',$datos['descripcion'],PDO::PARAM_STR);
            }
            $resultado=$insertar->execute();
            $sql ="SELECT count(*) as cantidad from producto where producto = :producto group by producto";
            $verificar=$this->conexion->prepare($sql);
            $verificar->bindParam(':producto',$datos['producto'],PDO::PARAM_STR);
            $verificar->execute();
            $resultado=$verificar->fetch(PDO::FETCH_ASSOC);
            if(isset($resultado['producto'])){
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

        if(!is_numeric($datos['precio']) or !is_numeric($datos['id_marca'])){
          return false;
         }
        if($datos['precio']>100000000 or $datos['precio']<0){
          return false;
        } 

        $datos['producto']=trim($datos['producto']);
        $this->conectar();
        $this->conexion->beginTransaction();
        try{

          $sql ="SELECT count(*) as cantidad FROM producto WHERE producto = :producto AND id_marca = :id_marca AND id_producto != :id_producto";
          $data=$this->conexion->prepare($sql);
          $data->bindParam(':producto',$datos['producto'],PDO::PARAM_STR);
          $data->bindParam(':id_marca',$datos['id_marca'],PDO::PARAM_INT);
          $data->bindParam(':id_producto',$id,PDO::PARAM_INT); // agregar exclusión por id actual
          $data->execute();
          $info=$data->fetch(PDO::FETCH_ASSOC);
          
          if($info['cantidad']>0){
              $this->conexion->rollback();
              return false;
          }
          


            $imagen= $this->cargar_imagen();
            if($imagen){
              $sql="UPDATE producto SET producto = :producto,precio=:precio,id_marca=:id_marca,descripcion=:descripcion,fotografia=:fotografia WHERE id_producto = :id_producto";
            }
            else{
              $sql="UPDATE producto SET producto = :producto,precio=:precio,id_marca=:id_marca,descripcion=:descripcion WHERE id_producto = :id_producto";
            }
          $actualizar=$this->conexion->prepare($sql);
          $actualizar->bindParam(':id_producto',$id,PDO::PARAM_INT);
          $actualizar->bindParam(':producto',$datos['producto'],PDO::PARAM_STR);
          $actualizar->bindParam(':precio',$datos['precio'],PDO::PARAM_STR);
          $actualizar->bindParam(':id_marca',$datos['id_marca'],PDO::PARAM_INT);

          if($imagen){
            $actualizar->bindParam(':fotografia',$imagen,PDO::PARAM_STR);
            $actualizar->bindParam(':descripcion',$datos['descripcion'],PDO::PARAM_STR);
         }
         else{
          $actualizar->bindParam(':descripcion',$datos['descripcion'],PDO::PARAM_STR);
        }
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
          $sql="DELETE FROM producto WHERE id_producto = :id_producto";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_producto',$id,PDO::PARAM_INT);
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
        $sql = "SELECT producto.* ,marca.marca from producto left join marca on producto.id_marca=marca.id_marca order by producto"; 

        if(!is_null($id_marca)){
          if(is_numeric($id_marca)){
            $sql = "SELECT producto.* ,marca.marca from producto left join marca on producto.id_marca=marca.id_marca where marca.id_marca=:id_marca order by producto"; 
          }
        }

        $datos = $this->conexion->prepare($sql); 

        if(!is_null($id_marca)){
          if(is_numeric($id_marca)){
            $datos->bindParam(':id_marca',$id_marca,PDO::PARAM_INT);
          }
        }

        $datos->execute();
        $resultado=$datos->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
      }

      function leeruno($id){
        $this->conectar();
        $datos = $this->conexion->prepare("SELECT  producto.* ,marca.marca from producto left join marca on producto.id_marca=marca.id_marca WHERE id_producto = :id_producto");
        $datos->bindParam(':id_producto',$id,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
        return $resultado;
      }

      function graficar(){
        $this->conectar();
        $datos=$this->conexion->prepare("SELECT * FROM producto p LEFT JOIN marca m ON p.id_marca = m.id_marca
        GROUP BY m.id_marca
        ORDER BY 1;");
        $datos->execute();
        $resultado=$datos->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
      }

    }
?>