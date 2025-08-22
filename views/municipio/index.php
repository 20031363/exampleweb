    
    <div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;">
        <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Municipios:</h1>
        <a href="municipio.php?accion=crear" class="btn btn-success botones-genf">Nuevo Municipio</a>
    </div>

    


<div style="place-items:center; align-items:center; text-align:center; margin:5%; ">
    <table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">
            <thead>
                <tr>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">ID_municipio</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Munucipio</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Estado</th>
                <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($producto_a as $producto): ?>

                <tr>
                <th scope="row"><?php echo $producto['id_municipio']; ?></th>
                <td><?php echo $producto['municipio']; ?></td>
                <td><?php echo $producto['estado'] ?></td>
                <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-primary botones-genf" href="municipio.php?accion=modificar&id=<?php echo $producto['id_municipio']; ?>">Modificar</a>               
                    <button  class="btn btn-danger botones-genf"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $producto['id_municipio']; ?>">
                Eliminar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $producto['id_municipio']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $producto['id_municipio']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel<?php echo $producto['id_municipio']; ?>">Eliminar Municipio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Seguro que Desea Eliminar Este Municipio?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-danger botones-genf" href="municipio.php?accion=eliminar&id=<?php echo $producto['id_municipio']; ?>">Eliminar</a>
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