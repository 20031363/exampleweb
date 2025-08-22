
<div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;">
        <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Alumnos:</h1>
        <?php   //if($app->checar_permiso("Empleado_escritura")): ?>
        <a href="cliente.php?accion=crear" class="btn btn-success botones-genf">Nuevo Alumno</a>
        <?php   //endif; ?>
        <a href="excel.php" target="_blank" class="btn btn-info botones-genf">Reporte Excel</a>
    </div>

    

<div style="place-items:center; align-items:center; text-align:center; margin:5%; ">
        <table class="table" style="font-size:0.8rem; font-weight:bolder;border-color:black;">
        <thead>
            <tr>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">id_alumno</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Alumno</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">P. Apellido</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">S. Apellido</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">ID_Usuario</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($marca_a as $marca): ?>

            <tr>
            <th scope="row"><?php echo $marca['id_cliente']; ?></th>
            <td><?php echo $marca['nombre']; ?></td>
            <td><?php echo $marca['primer_apellido'] ?></td>
            <td><?php echo $marca['segundo_apellido'] ?></td>
            <td><?php echo $marca['id_usuario'] ?></td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
     

                <a class="btn btn-primary botones-genf" href="cliente.php?accion=modificar&id=<?php echo $marca['id_cliente']; ?>">Modificar</a>

                <button  class="btn btn-danger botones-genf"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $marca['id_cliente']; ?>">
                Eliminar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $marca['id_cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $marca['id_cliente']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel<?php echo $marca['id_cliente']; ?>">Eliminar alumno</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Seguro que Desea Eliminar Este alumno?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-danger botones-genf" href="cliente.php?accion=eliminar&id=<?php echo $marca['id_cliente']; ?>">Eliminar</a>
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