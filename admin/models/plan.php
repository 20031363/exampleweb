<?php

    require_once(__DIR__.'/../model.php');

    class Plan extends Model{

      function crear($datos){

        if(isset($_POST['enviar'])){
          $this->conectar();
          $this->conexion->beginTransaction();
  
          if(isset($datos['nombre_plan']) && isset($datos['precio']) && isset($datos['empleado_id']) && isset($datos['duracion_dias'])  && isset($datos['usuarios_asignados'])){
            if(strlen($datos['nombre_plan'])>90){
              return false;
            }
            if(!is_numeric($datos['precio']) or !is_numeric($datos['empleado_id']) or !is_numeric($datos['duracion_dias']) or !is_numeric($datos['usuarios_asignados'])){
                  return false;
            }
            if($datos['precio']>100000000 or $datos['duracion_dias']<1 or $datos['usuarios_asignados']<0 or $datos['precio']<0){
              return false;
            }
            

            else{
              $datos['nombre_plan']=trim($datos['nombre_plan']);
            try{
              $sql ="SELECT count(*) as cantidad from plan_nutricional where nombre_plan = :nombre_plan and empleado_id = :empleado_id";
              $data=$this->conexion->prepare($sql);
              $data->bindParam(':nombre_plan',$datos['nombre_plan'],PDO::PARAM_STR);
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
            $pdf =$this->cargar_pdf();

            if($imagen){
              if($pdf){
                $sql="INSERT INTO plan_nutricional (nombre_plan,precio,empleado_id,fotografia,descripcion,duracion_dias,usuarios_asignados,archivo_pdf) VALUES (:nombre_plan,:precio,:empleado_id,:fotografia,:descripcion,:duracion_dias,:usuarios_asignados,:archivo_pdf)";
              }
              else{
                $sql="INSERT INTO plan_nutricional (nombre_plan,precio,empleado_id,fotografia,descripcion,duracion_dias,usuarios_asignados) VALUES (:nombre_plan,:precio,:empleado_id,:fotografia,:descripcion,:duracion_dias,:usuarios_asignados)";
              }
            }
            else{
                if($pdf){
                    $sql="INSERT INTO plan_nutricional (nombre_plan,precio,empleado_id,descripcion,duracion_dias,usuarios_asignados,archivo_pdf) VALUES (:nombre_plan,:precio,:empleado_id,:descripcion,:duracion_dias,:usuarios_asignados,:archivo_pdf)";
                  } 
                  else{
                    $sql="INSERT INTO plan_nutricional (nombre_plan,precio,empleado_id,descripcion,duracion_dias,usuarios_asignados) VALUES (:nombre_plan,:precio,:empleado_id,:descripcion,:duracion_dias,:usuarios_asignados)";
                  }
            }
            $insertar=$this->conexion->prepare($sql);
            $insertar->bindParam(':nombre_plan',$datos['nombre_plan'],PDO::PARAM_STR);
            $insertar->bindParam(':precio',$datos['precio'],PDO::PARAM_STR);
            $insertar->bindParam(':empleado_id',$datos['empleado_id'],PDO::PARAM_INT);
            $insertar->bindParam(':descripcion',$datos['descripcion'],PDO::PARAM_STR);
            $insertar->bindParam(':duracion_dias',$datos['duracion_dias'],PDO::PARAM_INT);
            $insertar->bindParam(':usuarios_asignados',$datos['usuarios_asignados'],PDO::PARAM_INT);
            if($imagen){
               $insertar->bindParam(':fotografia',$imagen,PDO::PARAM_STR);
               if($pdf){
                $insertar->bindParam(':archivo_pdf',$pdf,PDO::PARAM_STR);
               }
            }
            else{
                if($pdf){
                    $insertar->bindParam(':archivo_pdf',$pdf,PDO::PARAM_STR);
                }
             
            }
            $resultado=$insertar->execute();
            $sql ="SELECT count(*) as cantidad from plan_nutricional where nombre_plan = :nombre_plan group by nombre_plan";
            $verificar=$this->conexion->prepare($sql);
            $verificar->bindParam(':nombre_plan',$datos['nombre_plan'],PDO::PARAM_STR);
            $verificar->execute();
            $resultado=$verificar->fetch(PDO::FETCH_ASSOC);
            if(isset($resultado['nombre_plan'])){
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

      if(!is_numeric($datos['precio']) or !is_numeric($datos['empleado_id']) or !is_numeric($datos['duracion_dias']) or !is_numeric($datos['usuarios_asignados'])){
          return false;
      }

      if($datos['precio']>100000000 or $datos['duracion_dias']<1 or $datos['usuarios_asignados']<0 or $datos['precio']<0){
        return false;
      }

        $datos['nombre_plan']=trim($datos['nombre_plan']);
        $this->conectar();
        $this->conexion->beginTransaction();
        try{

          $sql ="SELECT count(*) as cantidad from plan_nutricional where nombre_plan = :nombre_plan and empleado_id = :empleado_id and id_plan != :id_plan";
          $data=$this->conexion->prepare($sql);
          $data->bindParam(':nombre_plan',$datos['nombre_plan'],PDO::PARAM_STR);
          $data->bindParam(':empleado_id',$datos['empleado_id'],PDO::PARAM_INT);
          $data->bindParam(':id_plan',$id,PDO::PARAM_INT);
          $data->execute();
          $info=$data->fetch(PDO::FETCH_ASSOC);
          if($info['cantidad']>0){
            $this->conexion->rollback();
            return false;
          }
          


            $imagen= $this->cargar_imagen();
            $pdf =$this->cargar_pdf();

            if($imagen){
              $sql="UPDATE plan_nutricional SET nombre_plan = :nombre_plan,precio=:precio,empleado_id=:empleado_id,descripcion=:descripcion,duracion_dias=:duracion_dias,usuarios_asignados=:usuarios_asignados,fotografia=:fotografia WHERE id_plan = :id_plan";
                if($pdf){
                    $sql="UPDATE plan_nutricional SET nombre_plan = :nombre_plan,precio=:precio,empleado_id=:empleado_id,descripcion=:descripcion,duracion_dias=:duracion_dias,usuarios_asignados=:usuarios_asignados,fotografia=:fotografia,archivo_pdf=:archivo_pdf WHERE id_plan = :id_plan";
                }
            }
            else{
                if($pdf){
                    $sql="UPDATE plan_nutricional SET nombre_plan = :nombre_plan,precio=:precio,empleado_id=:empleado_id,descripcion=:descripcion,duracion_dias=:duracion_dias,usuarios_asignados=:usuarios_asignados,archivo_pdf=:archivo_pdf WHERE id_plan = :id_plan";
                }
                else{
                    $sql="UPDATE plan_nutricional SET nombre_plan = :nombre_plan,precio=:precio,empleado_id=:empleado_id,descripcion=:descripcion,duracion_dias=:duracion_dias,usuarios_asignados=:usuarios_asignados WHERE id_plan = :id_plan";
                }
            }
            $actualizar = $this->conexion->prepare($sql);
            $actualizar->bindParam(':id_plan',$id,PDO::PARAM_INT);
            $actualizar->bindParam(':nombre_plan',$datos['nombre_plan'],PDO::PARAM_STR);
            $actualizar->bindParam(':precio',$datos['precio'],PDO::PARAM_STR);
            $actualizar->bindParam(':empleado_id',$datos['empleado_id'],PDO::PARAM_INT);
            $actualizar->bindParam(':descripcion',$datos['descripcion'],PDO::PARAM_STR);
            $actualizar->bindParam(':duracion_dias',$datos['duracion_dias'],PDO::PARAM_INT);
            $actualizar->bindParam(':usuarios_asignados',$datos['usuarios_asignados'],PDO::PARAM_INT);

            if($imagen){
                $actualizar->bindParam(':fotografia',$imagen,PDO::PARAM_STR);
                if($pdf){
                 $actualizar->bindParam(':archivo_pdf',$pdf,PDO::PARAM_STR);
                }
             }
             else{
                 if($pdf){
                     $actualizar->bindParam(':archivo_pdf',$pdf,PDO::PARAM_STR);
                 }
              
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
          $sql="DELETE FROM plan_nutricional WHERE id_plan = :id_plan";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_plan',$id,PDO::PARAM_INT);
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
        $sql = "SELECT plan_nutricional.* ,empleado.nombre,empleado.primer_apellido from plan_nutricional left join empleado on plan_nutricional.empleado_id=empleado.empleado_id order by nombre_plan"; 

        if(!is_null($id_marca)){
          if(is_numeric($id_marca)){
            $sql = "SELECT plan_nutricional.* ,empleado.nombre,empleado.primer_apellido from plan_nutricional left join empleado on plan_nutricional.empleado_id=empleado.empleado_id where empleado.empleado_id=:empleado_id order by nombre_plan"; 
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
        $datos = $this->conexion->prepare("SELECT plan_nutricional.* ,empleado.nombre,empleado.primer_apellido from plan_nutricional left join empleado on plan_nutricional.empleado_id=empleado.empleado_id WHERE id_plan=:id_plan"); 
        $datos->bindParam(':id_plan',$id,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
        return $resultado;
      }

    }
?>