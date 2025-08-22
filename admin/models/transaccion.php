<?php

    require_once(__DIR__.'/../model.php');

    class Transaccion extends Model{

      function crear($datos){


        if(!(isset($datos['empleado_id']) && isset($datos['id_cliente']))){
            return false;
        }
        
        $this->conectar();
        $this->conexion->beginTransaction();
        try{
          $sql="INSERT INTO transaccion(empleado_id,id_cliente) VALUES (:empleado_id,:id_cliente)";
          $insertar=$this->conexion->prepare($sql);
          $insertar->bindParam(':empleado_id',$datos['empleado_id'],PDO::PARAM_INT);
          $insertar->bindParam(':id_cliente',$datos['id_cliente'],PDO::PARAM_INT);
          $insertar->execute();
          $resultado=$this->conexion->lastInsertId();
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
        if(!(isset($datos['empleado_id']) && isset($datos['id_cliente']))){
            return false;
        }

        $this->conectar();
        $this->conexion->beginTransaction();
        try{

          $sql="UPDATE transaccion SET empleado_id = :empleado_id, id_cliente = :id_cliente WHERE id_transaccion = :id_transaccion";
          $actualizar=$this->conexion->prepare($sql);
          $actualizar->bindParam(':empleado_id',$datos['empleado_id'],PDO::PARAM_INT);
          $actualizar->bindParam(':id_cliente',$datos['id_cliente'],PDO::PARAM_INT);
          $actualizar->bindParam(':id_transaccion',$id,PDO::PARAM_INT);
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

          $sql="DELETE FROM transaccion_detalle WHERE id_transaccion = :id_transaccion";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_transaccion',$id,PDO::PARAM_INT);
          $eliminar->execute();
          $sql="DELETE FROM transaccion_detalle_planes WHERE id_transaccion = :id_transaccion";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_transaccion',$id,PDO::PARAM_INT);
          $eliminar->execute();
          $sql="DELETE FROM transaccion_detalle_cursos WHERE id_transaccion = :id_transaccion";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_transaccion',$id,PDO::PARAM_INT);
          $eliminar->execute();
          $sql="DELETE FROM transaccion WHERE id_transaccion = :id_transaccion";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_transaccion',$id,PDO::PARAM_INT);
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

      function eliminar_producto($id,$id_transaccion){
        $this->conectar();
        $this->conexion->beginTransaction();
        $cantidad=0;
        try{
          $sql="DELETE FROM transaccion_detalle WHERE id_transaccion = :id_transaccion and id_producto = :id_producto";
          $eliminar=$this->conexion->prepare($sql);
          $eliminar->bindParam(':id_producto',$id,PDO::PARAM_INT);
          $eliminar->bindParam(':id_transaccion',$id_transaccion,PDO::PARAM_INT);
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


      function leer_empleado(){

        $this->conectar();
        $datos = $this->conexion->prepare("SELECT * from empleado");
        $datos->execute();
        $resultado=$datos->fetchAll();
        return $resultado;
      }

      function leer_vinedo(){

        $this->conectar();
        $datos = $this->conexion->prepare("SELECT * from vinedo");
        $datos->execute();
        $resultado=$datos->fetchAll();
        return $resultado;
      }


      function leer_clientes(){

        $this->conectar();
        $datos = $this->conexion->prepare("SELECT * from clientes");
        $datos->execute();
        $resultado=$datos->fetchAll();
        return $resultado;
      }

      function leer(){
        $this->conectar();
        $datos = $this->conexion->prepare("
            SELECT 
                t.*,
                e.nombre AS nombre_empleado,
                e.primer_apellido AS primer_apellido_empleado,
                e.segundo_apellido AS segundo_apellido_empleado,
                c.nombre AS nombre_cliente,
                c.primer_apellido AS primer_apellido_cliente,
                c.segundo_apellido AS segundo_apellido_cliente
            FROM transaccion t
            LEFT JOIN empleado e ON e.empleado_id = t.empleado_id
            LEFT JOIN cliente c ON t.id_cliente = c.id_cliente
        ");
        $datos->execute();
        return $datos->fetchAll(PDO::FETCH_ASSOC);
    }
    

      function leer2(){

        $this->conectar();
        $datos = $this->conexion->prepare("SELECT t.*,e.* from transaccion t join empleado e on t.empleado_id=e.empleado_id");
        $datos->execute();
        $resultado=$datos->fetchAll();
        return $resultado;
      }

      function leeruno($id){
        $this->conectar();
        $datos = $this->conexion->prepare("SELECT * from transaccion where id_transaccion=:id_transaccion");
        $datos->bindParam(':id_transaccion',$id,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
        return $resultado;
      }


      function leerunodetalle($id){
        $this->conectar();
        $datos = $this->conexion->prepare("SELECT t.*,p.* from transaccion_detalle t join producto p on t.id_producto=p.id_producto where t.id_transaccion=:id_transaccion");
        $datos->bindParam(':id_transaccion',$id,PDO::PARAM_INT);
        $datos->execute();
        $resultado=$datos->fetchAll();
        return $resultado;
      }


      function obtenerReporteTransacciones() {
        $this->conectar();

        $sql = "
            SELECT 
                t.id_transaccion,
                t.fecha,
                CONCAT(c.nombre, ' ', c.primer_apellido) AS cliente,
                u.correo AS correo_cliente,
                CONCAT(e.nombre, ' ', e.primer_apellido) AS empleado,
                
                GROUP_CONCAT(DISTINCT CONCAT(pr.producto, ' (', td.cantidad, ')') SEPARATOR '<br>') AS productos,
                GROUP_CONCAT(DISTINCT CONCAT(pn.nombre_plan, ' (', tdp.cantidad, ')') SEPARATOR '<br>') AS planes,
                GROUP_CONCAT(DISTINCT CONCAT(cu.curso, ' (', tdc.cantidad, ')') SEPARATOR '<br>') AS cursos

            FROM transaccion t
            JOIN cliente c ON t.id_cliente = c.id_cliente
            JOIN usuario u ON c.id_usuario = u.id_usuario
            JOIN empleado e ON t.empleado_id = e.empleado_id

            LEFT JOIN transaccion_detalle td ON t.id_transaccion = td.id_transaccion
            LEFT JOIN producto pr ON td.id_producto = pr.id_producto

            LEFT JOIN transaccion_detalle_planes tdp ON t.id_transaccion = tdp.id_transaccion
            LEFT JOIN plan_nutricional pn ON tdp.id_plan = pn.id_plan

            LEFT JOIN transaccion_detalle_cursos tdc ON t.id_transaccion = tdc.id_transaccion
            LEFT JOIN Cursos cu ON tdc.id_curso = cu.id_curso

            GROUP BY t.id_transaccion
            ORDER BY t.fecha DESC
        ";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

      


    }
?>