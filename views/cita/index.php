<?php
require_once(__DIR__.'/../../admin/models/cita.php');
$app = new Cita();

?>


<div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;"> 
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Citas:</h1>
    <a href="cita.php?accion=crear" class="btn btn-success botones-genf">Nueva Cita</a>
</div>

<div style="place-items:center; align-items:center; text-align:center; margin:5%;">
    <table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">
        <thead>
            <tr>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">ID Cita</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Titulo</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Descripcion</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Fecha</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Lugar</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Alumno</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Docente/Mentor</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($citas as $cita): ?>
                <tr>
                    <th scope="row"><?php echo $cita['id_cita']; ?></th>
                    <td><?php echo $cita['titulo']; ?></td>
                    <td><?php echo $cita['descripcion']; ?></td>
                    <td><?php echo $cita['fecha_cita']; ?></td>
                    <td><?php echo ($cita['lugar']); ?></td>
                    <td><?php echo ($cita['id_cliente'].'-'.$cita['cliente']); ?></td>
                    <td><?php echo ($cita['empleado_id'].'-'.$cita['empleado']); ?></td>
                    <td>
                    <?php if($app->checar('Admin')): ?>
                        <div class="btn-group" role="group" aria-label="Opciones cita">
                            <a class="btn btn-primary botones-genf" href="cita.php?accion=modificar&id=<?php echo $cita['id_cita']; ?>">Modificar</a>               
                            <button class="btn btn-danger botones-genf" type="button" data-toggle="modal" data-target="#modalEliminar<?php echo $cita['id_cita']; ?>">Eliminar</button>
                        </div>

                        <!-- Modal de confirmación -->
                        <div class="modal fade" id="modalEliminar<?php echo $cita['id_cita']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?php echo $cita['id_cita']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel<?php echo $cita['id_cita']; ?>">Eliminar Cita</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Está seguro de que desea eliminar esta cita?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-danger botones-genf" href="cita.php?accion=eliminar&id=<?php echo $cita['id_cita']; ?>">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    </td>    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
