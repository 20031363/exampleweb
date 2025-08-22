<?php
require_once(__DIR__.'/../../admin/models/cita.php');
$app = new Cita();

?>
    
    <div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;">
        <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Materias:</h1>
        <a href="curso.php?accion=crear" class="btn btn-success botones-genf">Nueva Materia</a>
    </div>

    


<div style="place-items:center; align-items:center; text-align:center; margin:5%; ">
    <table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">
            <thead>
                <tr>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Id_Materia</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Imagen</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Link</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Materia</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Numero</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Docente</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Descripcion</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Creditos</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Inscritos</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($producto_a as $producto): ?>

                <tr>
                <th scope="row"><?php echo $producto['id_curso']; ?></th>
                <td>
                    <div class="text-center" >
                        <img src="../uploads/<?php echo $producto['fotografia']; ?>" class="rounded" alt="CURSO" width="100px">
                    </div>
                </td>
                <td>
                    <?php if(!empty($producto['link'])): ?>
                        <button onclick="window.open('<?php echo $producto['link']; ?>', '_blank')">
                            Ir al enlace
                        </button>
                    <?php else: ?>
                            No hay enlace
                    <?php endif; ?>
                </td>

    
                <td><?php echo $producto['curso']; ?></td>
                <td><?php echo $producto['precio'] ?></td>
                <td><?php echo ($producto['nombre'].''.$producto['primer_apellido']) ?></td>
                <td><?php echo $producto['descripcion'] ?></td>
                <td><?php echo $producto['duracion_horas'] ?></td>
                <td><?php echo $producto['inscritos'] ?></td>
                <td>
                <?php if($app->checar('Admin')): ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-primary botones-genf" href="curso.php?accion=modificar&id=<?php echo $producto['id_curso']; ?>">Modificar</a>               
                    <button  class="btn btn-danger botones-genf"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $producto['id_curso']; ?>">
                Eliminar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $producto['id_curso']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $producto['id_curso']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel<?php echo $producto['id_curso']; ?>">Eliminar Materia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Seguro que Desea Eliminar Esta Materia?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-danger botones-genf" href="curso.php?accion=eliminar&id=<?php echo $producto['id_curso']; ?>">Eliminar</a>
                    </div>
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