<?php

require_once(__DIR__.'/config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

    class Model{

        var $tipos;
        var $max_tam;

        private $usuario='conectatec';
        private $contrasena='123';
        private $db_host = 'localhost';
        private $db_name = 'conectatec';
        private $db_username = 'conectatec';
        private $port = "3306";
        private $db_password = '123';
        var $conexion;


        function  get_MaxTam(){
            $this->max_tam= 1024*10000000024;//estaos en kilobytes
            return $this->max_tam;
        }


        function cargar_imagen(){
            if(isset($_FILES)){
                $imagenes = $_FILES;
                foreach($imagenes as $imagen){
                    
                    if($imagen['error']==0){
                        if($imagen['size']<=$this->get_MaxTam()+1){
                            if(in_array($imagen['type'],$this->getTipos())){
                                $extension=explode('.',$imagen['name']);
                                $extension = $extension[sizeof($extension) - 1];
                                $nombre=md5($imagen['name']).random_int(1,1000000).'.'.$extension;
                                if(!file_exists(UPLOADDIR.$nombre)){
                                    if(move_uploaded_file($imagen['tmp_name'],UPLOADDIR.$nombre)){
                                        return $nombre;
                                    }
                                    else{
                                        return false;
                                    }                               
                                 }

                            }
                        }
                    }

                }
            }
            return false;
        }

        function cargar_pdf(){
            if (isset($_FILES)) {
                $archivos = $_FILES;
        
                foreach ($archivos as $archivo) {
                    if ($archivo['error'] === 0) {
                        if ($archivo['size'] <= $this->get_MaxTam() + 1) {
                            if (in_array($archivo['type'], $this->getTiposPDF())) {
                                $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
                                $nombre = md5($archivo['name']) . random_int(1, 1000000) . '.' . $extension;
        
                                if (!file_exists(UPLOADDIR . $nombre)) {
                                    if (move_uploaded_file($archivo['tmp_name'], UPLOADDIR . $nombre)) {
                                        return $nombre;
                                    } else {
                                        return false;
                                    }
                                }
                            }
                        }
                    }
                }
            }
            return false;
        }
        

        function getTiposPDF(){
            return ['application/pdf'];
        }
        

        function getTipos(){
            $this->tipos=array('image/jpeg','image/png','image/gif');
            return $this->tipos;
        }

        function conectar(){
            //$this->conexion = mysqli_connect("10.197.248.101",'vinedo','123','vinedo');
            //$usuario='vinedo';
            //$contrasena='123';
           $this->conexion = new PDO(SGBD.':host='.HOST.';dbname='.DB,USER,PASSWORD);

            //$this->conexion = new PDO('mysql:host=localhost;port=3306;dbname=vinedo',$this->usuario,$this->contrasena);
            //$this->conexion = new PDO('mysql:host='.$this->db_host.'; port=3308; dbname='.$this->db_name,$this->db_username,$this->db_password);
        }

        function alerta($alerta){
            include (__DIR__.'/../views/alerta.php');
        }


        function validar_rfc($rfc){
            if(strlen($rfc)>13){
                return false;
            }
            else{
                return true;
            }

        }

        function validar_curp($curp){
            if(strlen($curp)>18){
                return false;
            }
            else{
                return true;
            }  
        }

        function validat_fecha_nacimiento($nacimiento){
            return true;
        }

        function validar_contrasena($contrasena){
         if(strlen($contrasena)>32){
                return false;
            }
        else{
            return true;
        }
            
        }

        function validar_correo($correo){
            if(strlen($correo)>100){
                return false;
            }

            else{
                return true;
            }

        }

        function checar_permiso($permiso){
            if(isset($_SESSION['validado'])){
                 $permisos=isset($_SESSION['permisos'])? $_SESSION['permisos']:[];
                 if(in_array($permiso,$permisos)){
                    return true;
                }
            }
            return false;
         }
 
         function checar($rol){
            if(session_status() !== PHP_SESSION_ACTIVE) session_start();
        
            if(isset($_SESSION['validado']) && $_SESSION['validado'] === true){
                $roles = $_SESSION['roles'] ?? [];
                if (in_array(strtolower($rol), array_map('strtolower', $roles))) {
                    return true;
                }
            }
            return false;
        }
        


         function checar_d($rol){
            if(isset($_SESSION['validado'])){
                $roles=isset($_SESSION['roles'])? $_SESSION['roles']:[];
                if(in_array($rol,$roles)){
                    return true;
                }
            }
            include_once(__DIR__.'/views/header.php');
            $alerta=[];
            $alerta['mensaje']='CREDENCIALES DE ACCESO SON INVALIDAS  <a href="login.php"><span>Cambiar de Cuenta</span></a>!!';
            $alerta['tipo']='danger';
            $this->alerta($alerta);
            return false;
        }
        

        function logout(){
            unset($_SESSION['validado']);
            unset($_SESSION['correo']);
            unset($_SESSION['roles']);
            unset($_SESSION['permisos']);
            session_destroy();
            return true;
        }


        function login($correo,$contrasena){            
            $_SESSION['validado']=false;

            $contrasena=($contrasena);
            if(($this->validar_correo($correo))){
                    $sql=$this->conectar();
                    $sql="SELECT * FROM usuario WHERE correo=:correo AND contrasena=:contrasena";
                    $stm=$this->conexion->prepare($sql);
                    $stm->bindParam(':correo',$correo,PDO::PARAM_STR);
                    $stm->bindParam(':contrasena',$contrasena,PDO::PARAM_STR);  
                    $stm->execute();
                    $res=$stm->fetch();
                    if($res>0){
                          
                        $_SESSION['validado']=true;
                        $_SESSION['correo']=$correo;

                        $sql = "select r.rol from usuario u join usuario_rol ur on u.id_usuario=ur.id_usuario join rol r on ur.id_rol=r.id_rol where u.correo=:correo";
                        
                        $stmt=$this->conexion->prepare($sql);
                        $stmt->bindParam(':correo',$correo,PDO::PARAM_STR);
                        $stmt->execute();
                        $res= $stmt->fetchAll(PDO::FETCH_ASSOC);

                        $roles = [];
                        foreach ($res as $rol){
                            $roles[]=$rol['rol'];
                        }
            
                        $_SESSION['roles']=$roles;


                        return true;


                        }         
            }
            return false;
        }

        function enviar_correo($destinatario, $asunto, $mensaje) {
            require __DIR__.'/../vendor/autoload.php'; 
        
            
            $mail = new PHPMailer(true); 
        
            try {
               
                $mail->isSMTP();
                $mail->SMTPDebug = SMTP::DEBUG_OFF; 
                $mail->Host       = MAILSMTP;  
                $mail->Port       = 465;  // o 587 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
                $mail->SMTPAuth   = true;
                $mail->Username   = MAILUSER; 
                $mail->Password   = MAILPASSWORD;  
        
                // Destinatarios
                $mail->setFrom(MAILUSER, 'Conectatec Ichinoose');  
                $mail->addAddress($destinatario, 'Conectatec Ichinoose');  
        
               
                $mail->Subject = $asunto;
                $mail->isHTML(true);
                $mail->Body    = $mensaje; 
        
                // Envío del correo
                if ($mail->send()) {
                    echo 'Mensaje enviado correctamente';
                } else {
                    echo 'Error al enviar el mensaje';
                }
            } catch (Exception $e) {
                echo "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
            }
        }
        


        function cambiar_contrasena($correo){
            if($this->validar_correo($correo)){
                $this->conectar();
                $this->conexion->beginTransaction();
                try{
                        $sql="SELECT correo,contrasena from usuario WHERE correo=:correo";
                        $datos=$this->conexion->prepare($sql);
                        $datos->bindParam(':correo',$correo,PDO::PARAM_STR);
                        $datos->execute();
                        $resultado=$datos->fetch(PDO::FETCH_ASSOC);
                        if(isset($resultado['correo'])){
                            $blowfish='ichinoose kitawa'.rand(1,100000);
                            $token=md5($blowfish.$resultado['correo']).md5($resultado['contrasena']);
                            $sql="UPDATE usuario set token=:token where correo=:correo ";
                            $datos=$this->conexion->prepare($sql);
                            $datos->bindParam(':correo',$correo,PDO::PARAM_STR);
                            $datos->bindParam(':token',$token,PDO::PARAM_STR);
                            $datos->execute();
                            $this->conexion->commit();
                            return $token;
                        }
                        $this->conexion->rollback();
                        return false;


                    }  
                  catch(PDOException $e){
                    $this->conexion->rollback();
                    throw new Exception($e->getMessage());
                  }
            }
        }


        function validar_token($correo,$token){
            $this->conectar();
            $sql="SELECT correo from usuario where correo=:correo and token=:token";
            $datos=$this->conexion->prepare($sql);
            $datos->bindParam(':correo',$correo,PDO::PARAM_STR);
            $datos->bindParam(':token',$token,PDO::PARAM_STR);
            $datos->execute();
            $resultado=$datos->fetch(PDO::FETCH_ASSOC);
            if(isset($resultado['correo'])){
                return true;
            }
            else{
                return false;
            }
        }


        function restablecer($correo,$token,$contrasena){
            if($this->validar_token($correo,$token)){
                $this->conectar();
                $contrasena=($contrasena);
                $sql="UPDATE usuario set contrasena =:contrasena , token = null where correo=:correo";
                $datos=$this->conexion->prepare($sql);
                $datos->bindParam(':correo',$correo,PDO::PARAM_STR);
                $datos->bindParam(':contrasena',$contrasena,PDO::PARAM_STR);
                $datos->execute();
                $cantidad=$datos->rowCount();
                return $cantidad;
            }
            return false;
        }

        function obtener_id_cliente_por_correo($correo) {
            $this->conectar();
            $sql = "SELECT cliente.id_cliente FROM cliente LEFT JOIN usuario on cliente.id_usuario = usuario.id_usuario WHERE correo = :correo AND usuario.id_usuario = cliente.id_usuario";
            $datos = $this->conexion->prepare($sql);
            $datos->bindParam(':correo', $correo, PDO::PARAM_STR);
            $datos->execute();
            $resultado = $datos->fetch(PDO::FETCH_ASSOC);
        
            if ($resultado && isset($resultado['id_cliente'])) {
                return $resultado['id_cliente']; 
            } else {
                return false;
            }
        }


        function obtener_primer_empleado() {
            $this->conectar();
            $sql = "SELECT * FROM empleado ORDER BY empleado_id ASC LIMIT 1";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            $empleado = $stmt->fetch(PDO::FETCH_ASSOC);
        
            return $empleado ? $empleado : false;
        }
        
        function obtener_primer_empleado_id() {
            $this->conectar();
            $sql = "SELECT empleado_id FROM empleado ORDER BY empleado_id ASC LIMIT 1";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($resultado && isset($resultado['empleado_id'])) {
                return $resultado['empleado_id'];
            } else {
                return false;
            }
        }
        
        

        

    }

?>

