<?php
  require_once(__DIR__.'/models/producto.php');
  require_once(__DIR__.'/models/marca.php');
  require_once(__DIR__.'/models/transaccion.php');
  require_once(__DIR__.'/models/transaccion_detalle.php');
  require_once(__DIR__.'/models/transaccion_detalle_planes.php');
  require_once(__DIR__.'/models/transaccion_detalle_cursos.php');
  $web= new Producto();
  $web2= new Marca();
  $transaccion= new Transaccion();
  $transaccion_detalle_producto = new TransaccionProducto();
  $transaccion_detalle_plan = new TransaccionPlan();
  $transaccion_detalle_curso = new TransaccionCurso();

if (!$web->checar('Cliente')) {
    header('Location: /conectatec/index.php?error=acceso_denegado');
    exit;
}


?>

<?php
session_start();


if (!empty($_SESSION)) {

 
    $carrito = isset($_SESSION['carrito']) && is_array($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
    $planes = isset($_SESSION['planes']) && is_array($_SESSION['planes']) ? $_SESSION['planes'] : [];
    $cursos = isset($_SESSION['cursos']) && is_array($_SESSION['cursos']) ? $_SESSION['cursos'] : [];

 
    if (empty($carrito) && empty($planes) && empty($cursos)) {
        header('Location: /conectatec/index.php?error=ErrorFinalizar');
        exit;
    } else {

        if (!empty($carrito)) {
            $id_transaccion=0;
            echo "<h3>Carrito:</h3>";

                    // empleado genérico = 27
                    if (!isset($_SESSION['correo'])) {
                        header('Location: /conectatec/index.php?error=ErrorFinalizar');
                        exit;
                    }

                    $correo = $_SESSION['correo'];
                    $datos = [];
                    $datos['empleado_id'] = $web->obtener_primer_empleado_id();

                    $id_cliente = $web->obtener_id_cliente_por_correo($correo);
                    if ($id_cliente) {
                        $datos['id_cliente'] = $id_cliente;

                       
                        $id_transaccion = $transaccion->crear($datos);

                        if (!$id_transaccion) {
                            header('Location: /conectatec/index.php?error=ErrorFinalizar');
                            exit;
                        }


                        
                    } else {
                        header('Location: /conectatec/index.php?error=ErrorFinalizar');
                        exit;
                    }


                    foreach ($carrito as $item) {
                        echo "ID: " . $item['id'] . " - Nombre: " . $item['nombre'] . " - Cantidad: " . $item['cantidad'] . " - Precio: $" . $item['precio'] . "<br>";
                    
                        $datos_carrito = [
                            'id_transaccion' => $id_transaccion,
                            'id_producto' => $item['id'],
                            'cantidad' => $item['cantidad']
                        ];
                    
                        try {
                            $transaccion_detalle_producto->crear($datos_carrito);
                        } catch (Exception $e) {
                            header('Location: /conectatec/index.php?error=ErrorFinalizar');
                            exit;
                        }
                    }
                    


        }

        if (!empty($planes)) {
            $id_transaccion=0;
            echo "<h3>Planes:</h3>";



                                // empleado genérico = 27
                                if (!isset($_SESSION['correo'])) {
                                    header('Location: /conectatec/index.php?error=ErrorFinalizar');
                                    exit;
                                }
            
                                $correo = $_SESSION['correo'];
                                $datos = [];
                                $datos['empleado_id'] = $web->obtener_primer_empleado_id();
            
                                $id_cliente = $web->obtener_id_cliente_por_correo($correo);
                                if ($id_cliente) {
                                    $datos['id_cliente'] = $id_cliente;
            
                                  
                                    $id_transaccion = $transaccion->crear($datos);
            
                                    if (!$id_transaccion) {
                                        header('Location: /conectatec/index.php?error=ErrorFinalizar');
                                        exit;
                                    }
            
            
                                    
                                } else {
                                    header('Location: /conectatec/index.php?error=ErrorFinalizar');
                                    exit;
                                }



            foreach ($planes as $plan) {
                echo "ID: " . $plan['id'] . " - Nombre: " . $plan['nombre'] . " - Precio: $" . $plan['precio'] . "<br>";
                
                $cont=1;
                $datos_carrito = [
                    'id_transaccion' => $id_transaccion,
                    'id_plan' => $plan['id'],
                    'cantidad' => $cont
                ];
            
                try {
                    $transaccion_detalle_plan->crear($datos_carrito);
                } catch (Exception $e) {
                    header('Location: /conectatec/index.php?error=ErrorFinalizar');
                    exit;
                }

            }
        }

        if (!empty($cursos)) {
            $id_transaccion=0;
            echo "<h3>Cursos:</h3>";


                    // empleado genérico = 27
                    if (!isset($_SESSION['correo'])) {
                        header('Location: /conectatec/index.php?error=ErrorFinalizar');
                        exit;
                    }

                    $correo = $_SESSION['correo'];
                    $datos = [];
                    $datos['empleado_id'] = $web->obtener_primer_empleado_id();

                    $id_cliente = $web->obtener_id_cliente_por_correo($correo);
                    if ($id_cliente) {
                        $datos['id_cliente'] = $id_cliente;

                    
                        $id_transaccion = $transaccion->crear($datos);

                        if (!$id_transaccion) {
                            header('Location: /conectatec/index.php?error=ErrorFinalizar');
                            exit;
                        }


                        
                    } else {
                        header('Location: /conectatec/index.php?error=ErrorFinalizar');
                        exit;
                    }


            foreach ($cursos as $curso) {
                echo "ID: " . $curso['id'] . " - Nombre: " . $curso['nombre'] . " - Precio: $" . $curso['precio'] . "<br>";

                $cont=1;
                $datos_carrito = [
                    'id_transaccion' => $id_transaccion,
                    'id_curso' => $curso['id'],
                    'cantidad' => $cont
                ];
            
                try {
                    $transaccion_detalle_curso->crear($datos_carrito);
                } catch (Exception $e) {
                    header('Location: /conectatec/index.php?error=ErrorFinalizar');
                    exit;
                }


            }
        }
        unset($_SESSION['planes']);
        unset($_SESSION['cursos']);
        unset($_SESSION['carrito']);
        header('Location: /conectatec/index.php?error=LogarCompra');
        exit;
    }

} else {
    echo "La sesión está vacía o no existe.";
    header('Location: /conectatec/index.php?error=acceso_denegado');
    exit;
}
?>
