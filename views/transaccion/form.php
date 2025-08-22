<?php
require_once(__DIR__.'/../../admin/models/transaccion_detalle.php');
require_once(__DIR__.'/../../admin/models/transaccion_detalle_planes.php');
require_once(__DIR__.'/../../admin/models/transaccion_detalle_cursos.php');

$web = new TransaccionProducto();
$web2 = new TransaccionPlan();
$web3 = new TransaccionCurso();

if (!$web->checar('Admin')) {
    header('Location: /nutrimentorx/index.php');
    exit;
}

if(isset($_GET['id'])){
    $por_id=$_GET['id'];
    $lectura_detalle_producto=$web->leer_unico($por_id);
    $lectura_detalle_plan=$web2->leer_unico($por_id);
    $lectura_detalle_curso=$web3->leer_unico($por_id);
}




?>



<div style="margin:5%;">
    <h1 class="generic-font" style="color:black; font-weight:bolder;text-align:center;"><?php echo (isset($_GET['id']))?'Ver Detalle de la ':'Nueva'?>Inscripcion:</h1>
    <form action="transaccion.php?accion=<?php echo (isset($_GET['id']))?'modificar&id='.$_GET['id'] :'crear'?>" method="POST">
        
    
    <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color:black; font-weight:bolder;text-align:center;font-size:3rem;" for="two">Docente/Mentor:</label>
            <select name="datos[empleado_id]" id="three" required>
                <?php foreach($empleados as $empleado): ?>                  
                    <option value="<?php echo $empleado['empleado_id']; ?>" <?php echo (isset($_GET['id']) && $info['empleado_id']==$empleado['empleado_id'])?'selected':''; ?>><?php echo $empleado['nombre'].' '.$empleado['primer_apellido'].' '.$empleado['segundo_apellido'];?> </option>
                <?php   endforeach;  ?>
        </select>
        </div>


        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color:black; font-weight:bolder;text-align:center;font-size:3rem;" for="sddcc">Alumno:</label>
            <select name="datos[id_cliente]" id="sddcc" required>
                <?php foreach($clientes as $cliente): ?>                  
                    <option value="<?php echo $cliente['id_cliente']; ?>" <?php echo (isset($_GET['id']) && $info['id_cliente']==$cliente['id_cliente'])?'selected':''; ?>><?php echo $cliente['nombre'].' '.$cliente['primer_apellido'].' '.$cliente['segundo_apellido'];?> </option>
                <?php   endforeach;  ?>
        </select>
        </div>


        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color:black; font-weight:bolder;text-align:center;font-size:3rem;">Fecha: <span style="font-size: 2rem;"><?php echo isset($_GET['id'])?$info['fecha']:'--/--/--' ?></span></label>
        </div>




        <!--/////////////////////////////////////////////////////77-->



            <?php if(isset($_GET['id'])): ?>


                <div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;"> 
                    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Agregar Solicitud Libro:</h1>
                    <a href="transaccion_detalle.php?accion=crear" class="btn btn-success botones-genf">Nuevo Registro</a>
                </div>

                <div style="place-items:center; align-items:center; text-align:center; margin:5%;">
                    <table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">
                        <thead>
                            <tr>
                                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">ID Transaccion</th>
                                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Libro</th>
                                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Cantidad</th>
                                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($lectura_detalle_producto as $registro): ?>
                                <tr>
                                    <th scope="row"><?php echo $registro['id_transaccion']; ?></th>
                                    <td><?php echo ('['.$registro['id_producto'].']'.' Producto-> '.$registro['nombre'].',Marca-> '.$registro['marca']);  ?></td>
                                    <td><?php echo $registro['cantidad'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Opciones cita">
                                            <a class="btn btn-primary botones-genf" href="transaccion_detalle.php?accion=modificar&id=<?php echo $registro['id_transaccion']; ?>&id_2=<?php echo $registro['id_producto']; ?>">Modificar</a>               
                                            <button class="btn btn-danger botones-genf" type="button" data-toggle="modal" data-target="#modalEliminar<?php echo $registro['id_transaccion']; ?>">Eliminar</button>
                                        </div>

                                        <!-- Modal de confirmación -->
                                        <div class="modal fade" id="modalEliminar<?php echo $registro['id_transaccion']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?php echo $registro['id_transaccion']; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel<?php echo $registro['id_transaccion']; ?>">Eliminar registro</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de que desea eliminar este registro?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <a class="btn btn-danger botones-genf" href="transaccion_detalle.php?accion=eliminar&id=<?php echo $registro['id_transaccion']; ?>&id_2=<?php echo $registro['id_producto']; ?>">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>



            <?php endif; ?>

        <!--////////////////////////////////////////////////////////-->


        <!--/////////////////////////////////////////////////////77-->

            <?php if(isset($_GET['id'])): ?>


                                <div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;"> 
                    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Agregar Inscripcion Mentorias:</h1>
                    <a href="transaccion_detalle_planes.php?accion=crear" class="btn btn-success botones-genf">Nuevo Registro</a>
                </div>

                <div style="place-items:center; align-items:center; text-align:center; margin:5%;">
                    <table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">
                        <thead>
                            <tr>
                                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">ID Transaccion</th>
                                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Mentoria</th>
                                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Ext</th>
                                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($lectura_detalle_plan as $registro): ?>
                                <tr>
                                    <th scope="row"><?php echo $registro['id_transaccion']; ?></th>
                                    <td><?php echo ('['.$registro['id_plan'].']'.' Producto-> '.$registro['nombre_plan'].',Nutriologo-> '.$registro['nombre'].' '.$registro['primer_apellido'].' '.$registro['segundo_apellido']);  ?></td>
                                    <td><?php echo $registro['cantidad'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Opciones cita">
                                            <a class="btn btn-primary botones-genf" href="transaccion_detalle_planes.php?accion=modificar&id=<?php echo $registro['id_transaccion']; ?>&id_2=<?php echo $registro['id_plan']; ?>">Modificar</a>               
                                            <button class="btn btn-danger botones-genf" type="button" data-toggle="modal" data-target="#modalEliminar<?php echo $registro['id_transaccion']; ?>">Eliminar</button>
                                        </div>

                                        <!-- Modal de confirmación -->
                                        <div class="modal fade" id="modalEliminar<?php echo $registro['id_transaccion']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?php echo $registro['id_transaccion']; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel<?php echo $registro['id_transaccion']; ?>">Eliminar registro</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de que desea eliminar este registro?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <a class="btn btn-danger botones-genf" href="transaccion_detalle_planes.php?accion=eliminar&id=<?php echo $registro['id_transaccion']; ?>&id_2=<?php echo $registro['id_plan']; ?>">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


                
            <?php endif; ?>

        <!--////////////////////////////////////////////////////////-->


        <!--/////////////////////////////////////////////////////77-->

            <?php if(isset($_GET['id'])): ?>


                                <div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;"> 
                    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Agregar Inscripcion Materia:</h1>
                    <a href="transaccion_detalle_cursos.php?accion=crear" class="btn btn-success botones-genf">Nuevo Registro</a>
                </div>

                <div style="place-items:center; align-items:center; text-align:center; margin:5%;">
                    <table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">
                        <thead>
                            <tr>
                                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">ID Transaccion</th>
                                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Materia</th>
                                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Ext</th>
                                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($lectura_detalle_curso as $registro): ?>
                                <tr>
                                    <th scope="row"><?php echo $registro['id_transaccion']; ?></th>
                                    <td><?php echo ('['.$registro['id_curso'].']'.' Producto-> '.$registro['curso'].',Coach-> '.$registro['nombre'].' '.$registro['primer_apellido'].' '.$registro['segundo_apellido']);  ?></td>
                                    <td><?php echo $registro['cantidad'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Opciones cita">
                                            <a class="btn btn-primary botones-genf" href="transaccion_detalle_cursos.php?accion=modificar&id=<?php echo $registro['id_transaccion']; ?>&id_2=<?php echo $registro['id_curso']; ?>">Modificar</a>               
                                            <button class="btn btn-danger botones-genf" type="button" data-toggle="modal" data-target="#modalEliminar<?php echo $registro['id_transaccion']; ?>">Eliminar</button>
                                        </div>

                                        <!-- Modal de confirmación -->
                                        <div class="modal fade" id="modalEliminar<?php echo $registro['id_transaccion']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?php echo $registro['id_transaccion']; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel<?php echo $registro['id_transaccion']; ?>">Eliminar registro</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de que desea eliminar este registro?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <a class="btn btn-danger botones-genf" href="transaccion_detalle_cursos.php?accion=eliminar&id=<?php echo $registro['id_transaccion']; ?>&id_2=<?php echo $registro['id_curso']; ?>">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
  

                
            <?php endif; ?>

       <!--////////////////////////////////////////////////////////-->





        <div style="text-align:center;margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style=" padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/transaccion.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>





    </form>
</div>

