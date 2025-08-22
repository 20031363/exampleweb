<?php
require_once(__DIR__.'/../../admin/models/cita.php');
$app = new Cita();

?>


<div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Claves:</h1>
    <a href="cupon.php?accion=crear" class="btn btn-success botones-genf">Nueva Clave</a>
</div>

<div style="place-items:center; align-items:center; text-align:center; margin:5%; ">
    <table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">
        <thead>
            <tr>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Id_clave</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Código</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Codigo respaldo</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Fecha Inicio</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Fecha Fin</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Usos Máximos</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cupones as $cupon): ?>
            <tr>
                <th scope="row"><?php echo $cupon['id_cupon']; ?></th>
                <td><?php echo $cupon['codigo_cupon']; ?></td>
                <td><?php echo $cupon['descuento_porcentaje']; ?>%</td>
                <td><?php echo $cupon['fecha_inicio']; ?></td>
                <td><?php echo $cupon['fecha_fin']; ?></td>
                <td><?php echo $cupon['usos_maximos']; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-primary botones-genf" href="cupon.php?accion=modificar&id=<?php echo $cupon['id_cupon']; ?>">Modificar</a> 
                        <?php if($app->checar('Admin')): ?>
                        <button class="btn btn-danger botones-genf" type="button" data-toggle="modal" data-target="#modalEliminar<?php echo $cupon['id_cupon']; ?>">
                            Eliminar
                        </button>
                        <?php endif; ?>
                        <!-- Modal -->
                        <div class="modal fade" id="modalEliminar<?php echo $cupon['id_cupon']; ?>" tabindex="-1" role="dialog" aria-labelledby="labelModal<?php echo $cupon['id_cupon']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="labelModal<?php echo $cupon['id_cupon']; ?>">Eliminar Clave</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Seguro que desea eliminar esta clave?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <a class="btn btn-danger botones-genf" href="cupon.php?accion=eliminar&id=<?php echo $cupon['id_cupon']; ?>">Eliminar</a>
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
