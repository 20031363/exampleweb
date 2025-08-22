
<div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;">
        <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Docente/Mentor:</h1>
        <?php   //if($app->checar_permiso("Empleado_escritura")): ?>
        <a href="empleado.php?accion=crear" class="btn btn-success botones-genf">Nuevo Docente/Mentor</a>
        <?php   //endif; ?>
    </div>

    

<div style="place-items:center; align-items:center; text-align:center; margin:5%; ">
        <table class="table" style="font-size:0.8rem; font-weight:bolder;border-color:black;">
        <thead>
            <tr>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">personal_id</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Nombre</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">P. Apellido</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">S. Apellido</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">F. Nacimiento</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">RFC</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Curp</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Telefono</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Fecha de Gestion</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">ID_Usuario</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($marca_a as $marca): ?>

            <tr>
            <th scope="row"><?php echo $marca['empleado_id']; ?></th>
            <td><?php echo $marca['nombre']; ?></td>
            <td><?php echo $marca['primer_apellido'] ?></td>
            <td><?php echo $marca['segundo_apellido'] ?></td>
            <td><?php echo $marca['nacimiento']; ?></td>
            <td><?php echo $marca['rfc'] ?></td>
            <td><?php echo $marca['curp'] ?></td>
            <td><?php echo $marca['telefono'] ?></td>
            <td><?php echo $marca['fecha_contratacion'] ?></td>
            <td><?php echo $marca['id_usuario'] ?></td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
     

                <a class="btn btn-primary botones-genf" href="empleado.php?accion=modificar&id=<?php echo $marca['empleado_id']; ?>">Modificar</a>

                <button  class="btn btn-danger botones-genf"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $marca['empleado_id']; ?>">
                Eliminar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $marca['empleado_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $marca['empleado_id']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel<?php echo $marca['empleado_id']; ?>">Eliminar del Personal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Seguro que Desea Eliminar Este Usuario?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-danger botones-genf" href="empleado.php?accion=eliminar&id=<?php echo $marca['empleado_id']; ?>">Eliminar</a>
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