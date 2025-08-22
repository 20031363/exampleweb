    
    <div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;">
        <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Incripciones:</h1>
        <a href="transaccion.php?accion=crear" class="btn btn-success botones-genf">Nueva Inscripcion</a>
        <a href="reporte.php?accion=transacciones" target="_blank" class="btn btn-info botones-genf">Reporte</a>
    </div>

    
<div style="place-items:center; align-items:center; text-align:center; margin:5%; ">
        <table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">
        <thead>
            <tr>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Id_Inscripcion</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Docente/Mentor</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Alumno</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Fecha</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
            </tr>
        </thead>
        <tbody>

        

            <?php foreach($marca_a as $marca): ?>

            <tr>
            <th scope="row"><?php echo $marca['id_transaccion']; ?></th>
            <td><?php echo ($marca['nombre_empleado']." ".$marca['primer_apellido_empleado']." ".$marca['segundo_apellido_empleado']); ?></td>
            <td><?php echo ($marca['nombre_cliente']." ".$marca['primer_apellido_cliente']." ".$marca['segundo_apellido_cliente']); ?></td>
            <td><?php echo $marca['fecha'];  ?></td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-primary botones-genf" href="transaccion.php?accion=modificar&id=<?php echo $marca['id_transaccion']; ?>">Ver Detalles</a>
                <button  class="btn btn-danger botones-genf"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $marca['id_transaccion']; ?>">
                Eliminar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $marca['id_transaccion']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $marca['id_transaccion']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel<?php echo $marca['id_transaccion']; ?>">Eliminar Inscripcion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        En esta inscripcion hay ... productos que se van a eliminar
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-danger botones-genf" href="transaccion.php?accion=eliminar&id=<?php echo $marca['id_transaccion']; ?>">Eliminar</a>
                    </div>
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