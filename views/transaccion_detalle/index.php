<div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;"> 
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Agregar Transaccion Libros:</h1>
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
            <?php foreach($registros as $registro): ?>
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
