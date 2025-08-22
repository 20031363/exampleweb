<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); 
    }
    require_once(__DIR__.'/model.php');
    $app = new Model();
    $accion = 'login';
    $accion= isset($_GET['accion'])?$_GET['accion']:null;
    $alerta=[];

    switch($accion){
        case 'crear':
            require_once(__DIR__.'/models/cliente.php');
            $web= new Cliente();
            if(isset($_POST['enviar'])){
                $datos=$_POST['datos'];
    
    
                $resultado=$web->crear($datos);
                if($resultado){
                    $alerta['mensaje']='REGISTRADO CON EXITO INTENTE INICIAR SESSION!!';
                    $alerta['tipo']='success';
                    $marca_a=$web->leer();
                    $web->alerta($alerta);      
                    include_once(__DIR__.'/login/login.php');
                }
                else{
                    $alerta['mensaje']='OCURRIO UN PROBLEMA NO SE PUDO REGISTRAR!!';
                    $alerta['tipo']='danger';
                    $web->alerta($alerta);      
                    include_once(__DIR__.'/login/login.php');  
                }
            }
            else{
                $alerta['mensaje']='ERROR EN LA CAPTURA DE DATOS INTENTE NUEVAMENTE!!';
                $alerta['tipo']='danger';
                $web->alerta($alerta);    
                include_once(__DIR__.'/login/login.php');  
            }
            break;

        case 'registrar':
            include_once(__DIR__.'/login/login_registrar.php'); 
            break;

        case 'nueva':
            $datos=$_POST['datos'];
            if($app->validar_correo($datos['correo'])&&strlen($datos['token'])<=64){
                if($app->validar_token($datos['correo'],$datos['token'])){
                    if($app->restablecer($datos['correo'],$datos['token'],$datos['contrasena'])){
                        header('Location: login.php');
                        $alerta['mensaje']='SU CONTRASEÑA A SIDO CAMBIADA!!';
                        $alerta['tipo']='success';
                        $app->alerta($alerta);
                    } 
                }
            }
            break;
        case 'logout':
            if($app->logout()){
             $alerta['mensaje']='SESSION CERRADA CORRECTAMENTE!!';
             $alerta['tipo']='success';
             $app->alerta($alerta);
             include_once(__DIR__.'/login/login.php');
            }
             break; 
        case 'prueba':
            $app->enviar_correo('javiirving915@gmail.com','tester','para conectatec');
            break;
        case 'olvidar':
            include_once(__DIR__.'/login/login_olvidar.php'); 
            break;
        case 'cambiar':
            if(isset($_POST['enviar'])){
                $datos=$_POST['datos'];
                $token = $app->cambiar_contrasena($datos['correo']);
                if($token){
                    $alerta['mensaje']='SE ENVIO UN CORREO DE RECUPERACION SI ES QUE EXISTE!!';
                    $alerta['tipo']='success';
                    $app->alerta($alerta);
                    
                     $mensaje = "Estimado Usuario, has solicitado un cambio de contraseña, 
                     por favor presiona el siguiente enlace para restablecerla<br>
                     <a href='https://localhost/conectatec/admin/login.php?accion=restablecer&correo=" . $datos['correo'] . "&token=" . $token . "'>Presiona Aquí</a>";
                     
                    $app->enviar_correo($datos['correo'],'Restablecimiento Contraseña conectatec',$mensaje);
                    include_once(__DIR__.'/login/login.php'); 
                }
            }
            break;
        case 'restablecer':
            $datos=$_GET;
            if($app->validar_correo($datos['correo'])&&strlen($datos['token'])<=64){
                if($app->validar_token($datos['correo'],$datos['token'])){
                    include_once(__DIR__.'/login/login_restablecer.php'); 
                }
            }

            break;
        case 'login':   
        default:
        if(isset($_POST['enviar'])){
            $datos=$_POST['datos'];
            if($app->login($datos['correo'],$datos['contrasena'])){

                
                if($app->checar('Cliente')) {
                    header('Location: /conectatec/index.php'); 
                }


                if($app->checar('Admin')){
                    header('Location: index.php');
                }

                else{
                    header('Location: panel.php');
                }
            
            }
            else{
                $alerta['mensaje']='CREDENCIALES INCORECTAS!!';
                $alerta['tipo']='danger';
                $app->alerta($alerta);
            }
        }
        include_once(__DIR__.'/login/login.php');
        break;

    }
?>