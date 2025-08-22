<?php
require_once(__DIR__.'/../../admin/models/cita.php');
$app = new Cita();

?>


<div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Evaluacion de Materias:</h1>
    <?php if($app->checar('Admin')): ?>
    <a href="resena_curso.php?accion=crear" class="btn btn-success botones-genf">Nueva Evaluacion</a>
    <?php endif; ?>
</div>

<div style="place-items:center; align-items:center; text-align:center; margin:5%;">
    <table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">
        <thead>
            <tr>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">ID Evaluacion</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Titulo</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Calificacion</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Fecha Evaluacion</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Materia</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Alumno</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($producto_a as $producto): ?>
                <tr>
                    <th scope="row"><?php echo $producto['id_resena']; ?></th>
                    <td><?php echo $producto['comentario']; ?></td>
                    <td><?php echo $producto['calificacion']; ?></td>
                    <td><?php echo $producto['fecha_resena']; ?></td>
                    <td><?php echo $producto['curso']; ?></td>
                    <td><?php echo $producto['cliente']; ?></td>
                    <td>
                    <?php if($app->checar('Admin')): ?>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-primary botones-genf" href="resena_curso.php?accion=modificar&id=<?php echo $producto['id_resena']; ?>">Modificar</a>               
                            <button class="btn btn-danger botones-genf" type="button" data-toggle="modal" data-target="#modalEliminar<?php echo $producto['id_resena']; ?>">Eliminar</button>
                        </div>

                        <!-- Modal de confirmación -->
                        <div class="modal fade" id="modalEliminar<?php echo $producto['id_resena']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?php echo $producto['id_resena']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel<?php echo $producto['id_resena']; ?>">Eliminar Evaluacion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Está seguro de que desea eliminar esta evaluacion?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-danger botones-genf" href="resena_curso.php?accion=eliminar&id=<?php echo $producto['id_resena']; ?>">Eliminar</a>
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
