<?php
    require_once (__DIR__.'/../vendor3/autoload.php');
    require_once(__DIR__.'/models/reporte.php');
    $web = new Reporte();
   

    if(!$web->checar('Admin')) {
        header('Location: /conectatec/index.php'); 
        exit; 
    }


    $accion=isset($_GET['accion'])?$_GET['accion']:null;

    switch($accion){
        case 'hola':
            $mpdf= new \Mpdf\Mpdf ($web->a4());
            $mpdf->addPage();
            $mpdf->setHeader($web->encabezado());
            $mpdf->WriteHtml('<h1>Hola mundo</h1>');
            $mpdf->setFooter($web->pie());
            break;
        case 'marca':
            require_once(__DIR__.'/models/marca.php');
            $web2= new Marca();
            $mpdf= new \Mpdf\Mpdf ($web->a4());
            $mpdf->addPage();
            $mpdf->setHeader($web->encabezado());
            $mpdf->WriteHtml('<h1>Hola Amigo</h1>');
            $mpdf->setFooter($web->pie());
            $marcas=$web2->graficar2();
            $imagen='../IMAGES/logo_v.png';
            $mpdf->WriteHtml('<div><img src="'.$imagen.'" width="300" alt="LOGO ESMERALDA"></div>');
            $mpdf->WriteHtml('<h1>Marcas:</h1>');
            $mpdf->WriteHtml('<table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">');
            $mpdf->WriteHtml('<thead><tr><th scope="col" style="background-color:black; color:white;">Id_Marca</th><th scope="col" style="background-color:black; color:white;">Marcas</th><th scope="col" style="background-color:black; color:white;">Cantidad</th></tr></thead><tbody>');
            foreach($marcas as $marca){
                $mpdf->WriteHtml('<tr>');
                $mpdf->WriteHtml('<th scope="row">'.$marca['id_marca'].'</th>');
                $mpdf->WriteHtml('<td>'.$marca['marca'].'</td>');
                $mpdf->WriteHtml('<td>'.$marca['cantidad'].'</td>');
                $mpdf->WriteHtml('</tr>');
            }
            $mpdf->WriteHtml('</tbody></table>');
            $mpdf->Output('marcas.pdf','I');
            break;
        case 'producto':
                require_once(__DIR__.'/models/producto.php');
                $web3= new Producto();
                $mpdf= new \Mpdf\Mpdf ($web->a4());
                $mpdf->addPage();
                $mpdf->setHeader($web->encabezado());
                $mpdf->WriteHtml('<h1>Hola Amigo</h1>');
                $mpdf->setFooter($web->pie());
                $productos=$web3->graficar();
                $imagen='../IMAGES/logo_v.png';
                $mpdf->WriteHtml('<div><img src="'.$imagen.'" width="300" alt="LOGO ESMERALDA"></div>');
                $mpdf->WriteHtml('<h1>Productos:</h1>');
                $mpdf->WriteHtml('<table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">');
                $mpdf->WriteHtml('<thead><tr><th scope="col" style="background-color:black; color:white;">Id_Producto</th><th scope="col" style="background-color:black; color:white;">Marcas</th><th scope="col" style="background-color:black; color:white;">Cantidad</th><th scope="col" style="background-color:black; color:white;">Opciones</th></tr></thead><tbody>');
                foreach($productos as $producto){
                    $mpdf->WriteHtml('<tr>');
                    $mpdf->WriteHtml('<th scope="row">'.$producto['id_producto'].'</th>');
                    $mpdf->WriteHtml('<td>'.$producto['producto'].'</td>');
                    $mpdf->WriteHtml('<td>'.$producto['marca'].'</td>');
                    $mpdf->WriteHtml('<td>'.$producto['costo'].'</td>');
                    $mpdf->WriteHtml('<td>'.$producto['precio'].'</td>');
                    $mpdf->WriteHtml('</tr>');
                }
                $mpdf->WriteHtml('</tbody></table>');
                $mpdf->WriteHtml('<p>Cantidad:'.count($productos). '</p>');
                $mpdf->Output('productos.pdf','I');
                break;
        case 'transaccion':
                    require_once(__DIR__.'/models/producto.php');
                    $web3= new Producto();
                    $mpdf= new \Mpdf\Mpdf ($web->a4());
                    $mpdf->addPage();
                    $mpdf->setHeader($web->encabezado());
                    $mpdf->WriteHtml('<h1>Hola Amigo</h1>');
                    $mpdf->setFooter($web->pie());
                    $productos=$web3->graficar();
                    $imagen='../IMAGES/logo_v.png';
                    $mpdf->WriteHtml('<div><img src="'.$imagen.'" width="300" alt="LOGO ESMERALDA"></div>');
                    $mpdf->WriteHtml('<h1>Productos:</h1>');
                    $mpdf->WriteHtml('<table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">');
                    $mpdf->WriteHtml('<thead><tr><th scope="col" style="background-color:black; color:white;">Id_Producto</th><th scope="col" style="background-color:black; color:white;">Marcas</th><th scope="col" style="background-color:black; color:white;">Cantidad</th><th scope="col" style="background-color:black; color:white;">Opciones</th></tr></thead><tbody>');
                    foreach($productos as $producto){
                        $mpdf->WriteHtml('<tr>');
                        $mpdf->WriteHtml('<th scope="row">'.$producto['id_producto'].'</th>');
                        $mpdf->WriteHtml('<td>'.$producto['producto'].'</td>');
                        $mpdf->WriteHtml('<td>'.$producto['marca'].'</td>');
                        $mpdf->WriteHtml('<td>'.$producto['costo'].'</td>');
                        $mpdf->WriteHtml('<td>'.$producto['precio'].'</td>');
                        $mpdf->WriteHtml('</tr>');
                    }
                    $mpdf->WriteHtml('</tbody></table>');
                    $mpdf->WriteHtml('<p>Cantidad:'.count($productos). '</p>');
                    $mpdf->Output('productos.pdf','I');
                    break;
        case 'transacciones':
                        require_once(__DIR__.'/models/transaccion.php');
                        $modeloTrans = new Transaccion();
                    
                        $mpdf = new \Mpdf\Mpdf($web->a4());
                        $mpdf->addPage();
                        $mpdf->setHeader($web->encabezado());
                        $mpdf->setFooter($web->pie());
                    
                        $transacciones = $modeloTrans->obtenerReporteTransacciones();
                        $logo = '../IMAGES/logo_v.png';
                    
                        $mpdf->WriteHtml('<div style="text-align:center;"><img src="'.$logo.'" width="200"></div>');
                        $mpdf->WriteHtml('<h2 style="text-align:center; color:#2c3e50;">Reporte de Transacciones</h2>');
                    
                        $mpdf->WriteHtml('<table style="width:100%; border-collapse:collapse; font-size:0.9rem;" border="1" cellpadding="6">');
                        $mpdf->WriteHtml('<thead style="background-color:#444; color:white;">
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Correo</th>
                                <th>Empleado</th>
                                <th>Productos</th>
                                <th>Planes</th>
                                <th>Cursos</th>
                            </tr>
                        </thead><tbody>');
                    
                        foreach ($transacciones as $t) {
                            $mpdf->WriteHtml('<tr>');
                            $mpdf->WriteHtml('<td>'.$t['id_transaccion'].'</td>');
                            $mpdf->WriteHtml('<td>'.$t['fecha'].'</td>');
                            $mpdf->WriteHtml('<td>'.$t['cliente'].'</td>');
                            $mpdf->WriteHtml('<td>'.$t['correo_cliente'].'</td>');
                            $mpdf->WriteHtml('<td>'.$t['empleado'].'</td>');
                            $mpdf->WriteHtml('<td>'.$t['productos'].'</td>');
                            $mpdf->WriteHtml('<td>'.$t['planes'].'</td>');
                            $mpdf->WriteHtml('<td>'.$t['cursos'].'</td>');
                            $mpdf->WriteHtml('</tr>');
                        }
                    
                        $mpdf->WriteHtml('</tbody></table>');
                        $mpdf->WriteHtml('<p>Total transacciones: <strong>'.count($transacciones).'</strong></p>');
                        $mpdf->Output('reporte_transacciones.pdf', 'I');
                        break;
    }

?>