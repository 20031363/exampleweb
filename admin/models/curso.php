<?php

    require_once(__DIR__.'/../model.php');

    class Curso extends Model{

      function crear($datos){

        if(isset($_POST['enviar'])){
          $this->conectar();
          $this->conexion->beginTransaction();
  
          if(isset($datos['curso']) && isset($datos['precio']) && isset($datos['empleado_id']) && isset($datos['duracion_horas'])  && isset($datos['inscritos'])){
            if(strlen($datos['curso'])>90){
              return false;
            }
            if(!is_numeric($datos['precio']) or !is_numeric($datos['empleado_id']) or !is_numeric($datos['duracion_horas']) or !is_numeric($datos['inscritos'])){
                  return false;
            }
            if($datos['precio']>100000000 or $datos['duracion_horas']<1 or $datos['inscritos']<0 or $datos['precio']<0){
              return false;
            }
            

            else{
              $datos['curso']=trim($datos['curso']);
            try{
              $sql ="SELECT count(*) as cantidad from Cursos where curso = :curso and empleado_id = :empleado_id";
              $data=$this->conexion->prepare($sql);
              $data->bindParam(':curso',$datos['curso'],PDO::PARAM_STR);
              $data->bindParam(':empleado_id',$datos['empleado_id'],PDO::PARAM_INT);
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
              $sql="INSERT INTO Cursos (curso,precio,empleado_id,fotografia,descripcion,duracion_horas,inscritos,link) VALUES (:curso,:precio,:empleado_id,:fotografia,:descripcion,:duracion_horas,:inscritos,:link)";
            }
            else{
              $sql="INSERT INTO Cursos (curso,precio,empleado_id,descripcion,duracion_horas,inscritos,link) VALUES (:curso,:precio,:empleado_id,:descripcion,:duracion_horas,:inscritos,:link)";
            }
            $insertar=$this->conexion->prepare($sql);
            $insertar->bindParam(':curso',$datos['curso'],PDO::PARAM_STR);
            $insertar->bindParam(':precio',$datos['precio'],PDO::PARAM_STR);
            $insertar->bindParam(':empleado_id',$datos['empleado_id'],PDO::PARAM_INT);
            $insertar->bindParam(':descripcion',$datos['descripcion'],PDO::PARAM_STR);
            $insertar->bindParam(':duracion_horas',$datos['duracion_horas'],PDO::PARAM_INT);
            $insertar->bindParam(':inscritos',$datos['inscritos'],PDO::PARAM_INT);
            $insertar->bindParam(':link',$datos['link'],PDO::PARAM_STR);
            if($imagen){
               $insertar->bindParam(':fotografia',$imagen,PDO::PARAM_STR);
            }
            $resultado=$insertar->execute();
            $sql ="SELECT count(*) as cantidad from Cursos where curso = :curso group by curso";
            $verificar=$this->conexion->prepare($sql);
            $verificar->bindParam(':curso',$datos['curso'],PDO::PARAM_STR);
            $verificar->execute();
            $resultado=$verificar->fetch(PDO::FETCH_ASSOC);
            if(isset($resultado['curso'])){
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

      if(!is_numeric($datos['precio']) or !is_numeric($datos['empleado_id']) or !is_numeric($datos['duracion_horas']) or !is_numeric($datos['inscritos'])){
          return false;
      }

      if($datos['precio']>100000000 or $datos['duracion_horas']<1 or $datos['inscritos']<0 or $datos['precio']<0){
        return false;
      }

        $datos['curso']=trim($datos['curso']);
        $this->conectar();
        $this->conexion->beginTransaction();
        try{

          $sql ="SELECT count(*) as cantidad from Cursos where curso = :curso and empleado_id = :empleado_id and id_curso != :id_curso";
          $data=$this->conexion->prepare($sql);
          $data->bindParam(':curso',$datos['curso'],PDO::PARAM_STR);
          $data->bindParam(':empleado_id',$datos['empleado_id'],PDO::PARAM_INT);
          $data->bindParam(':id_curso',$id,PDO::PARAM_INT);
          $data->execute();
          $info=$data->fetch(PDO::FETCH_ASSOC);
          if($info['cantidad']>0){
            $this->conexion->rollback();
            return false;
          }
          
            $imagen= $this->cargar_imagen();

            if($imagen){
              $sql="UPDATE Cursos SET curso = :curso,precio=:precio,empleado_id=:empleado_id,descripcion=:descripcion,duracion_horas=:duracion_horas,inscritos=:inscritos,fotografia=:fotografia,link=:link WHERE id_curso = :id_curso";
            }
            else{
              $sql="UPDATE Cursos SET curso = :curso,precio=:precio,empleado_id=:empleado_id,descripcion=:descripcion,duracion_horas=:duracion_horas,inscritos=:inscritos,link=:link WHERE id_curso = :id_curso";
            }
            $actualizar = $this->conexion->prepare($sql);
            $actualizar->bindParam(':id_curso',$id,PDO::PARAM_INT);
            $actualizar->bindParam(':curso',$datos['curso'],PDO::PARAM_STR);
            $actualizar->bindParam(':precio',$datos['precio'],PDO::PARAM_STR);
            $actualizar->bindParam(':empleado_id',$datos['empleado_id'],PDO::PARAM_INT);
            $actualizar->bindParam(':descripcion',$datos['descripcion'],PDO::PARAM_STR);
            $actualizar->bindParam(':duracion_horas',$datos['duracion_horas'],PDO::PARAM_INT);
            $actualizar->bindParam(':inscritos',$datos['inscritos'],PDO::PARAM_INT);
            $actualizar->bindParam(':link',$datos['link'],PDO::PARAM_STR);

            if($imagen){
                $actualizar->bindParam(':fotografia',$imagen,PDO::PARAM_STR);
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
          $sql="DELETE FROM Cursos WHERE id_curso = :id_curso";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_curso',$id,PDO::PARAM_INT);
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
        $sql = "SELECT Cursos.* ,empleado.nombre,empleado.primer_apellido from Cursos left join empleado on Cursos.empleado_id=empleado.empleado_id order by curso"; 

        if(!is_null($id_marca)){
          if(is_numeric($id_marca)){
            $sql = "SELECT Cursos.* ,empleado.nombre,empleado.primer_apellido from Cursos left join empleado on Cursos.empleado_id=empleado.empleado_id where empleado.empleado_id=:empleado_id order by curso"; 
          }
        }

        $datos = $this->conexion->prepare($sql); 

        if(!is_null($id_marca)){
          if(is_numeric($id_marca)){
            $datos->bindParam(':empleado_id',$id_marca,PDO::PARAM_INT);
          }
        }

        $datos->execute();
        $resultado=$datos->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
      }

      function leeruno($id){
        $this->conectar();
        $datos = $this->conexion->prepare("SELECT Cursos.* ,empleado.nombre,empleado.primer_apellido from Cursos left join empleado on Cursos.empleado_id=empleado.empleado_id WHERE id_curso=:id_curso"); 
        $datos->bindParam(':id_curso',$id,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
        return $resultado;
      }

    }
?>