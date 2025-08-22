<?php
require_once(__DIR__.'/../../admin/models/cita.php');
$app = new Cita();

?>


    <div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;">
        <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Libros:</h1>
        <a href="producto.php?accion=crear" class="btn btn-success botones-genf">Nuevo Libro</a>
    </div>

    


<div style="place-items:center; align-items:center; text-align:center; margin:5%; ">
    <table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">
            <thead>
                <tr>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Id_Libro</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Imagen</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Titulo</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Donativo</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Externo</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Descripcion</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($producto_a as $producto): ?>

                <tr>
                <th scope="row"><?php echo $producto['id_producto']; ?></th>
                <td>
                    <div class="text-center" >
                        <img src="../uploads/<?php echo $producto['fotografia']; ?>" class="rounded" alt="PRODUCTO" width="100px">
                    </div>
                </td>
                <td><?php echo $producto['producto']; ?></td>
                <td><?php echo $producto['precio'] ?></td>
                <td><?php echo $producto['marca'] ?></td>
                <td><?php echo $producto['descripcion'] ?></td>
                <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-primary botones-genf" href="producto.php?accion=modificar&id=<?php echo $producto['id_producto']; ?>">Modificar</a>               
                    <button  class="btn btn-danger botones-genf"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $producto['id_producto']; ?>">
                Eliminar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $producto['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $producto['id_producto']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel<?php echo $producto['id_producto']; ?>">Eliminar Libro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Seguro que Desea Eliminar Este Libro?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-danger botones-genf" href="producto.php?accion=eliminar&id=<?php echo $producto['id_producto']; ?>">Eliminar</a>
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