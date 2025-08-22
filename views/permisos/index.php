    
    <div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;">
        <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Permisos:</h1>
        <a href="permisos.php?accion=crear" class="btn btn-success botones-genf">Nuevo Permiso:</a>
    </div>

    

<div style="place-items:center; align-items:center; text-align:center; margin:5%; ">
        <table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">
        <thead>
            <tr>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">ID_Permiso</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Permiso</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($marca_a as $marca): ?>

            <tr>
            <th scope="row"><?php echo $marca['id_permiso']; ?></th>
            <td><?php echo $marca['permiso']; ?></td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-primary botones-genf" href="permisos.php?accion=modificar&id=<?php echo $marca['id_permiso']; ?>">Modificar</a>
                <a class="btn btn-danger botones-genf" href="permisos.php?accion=eliminar&id=<?php echo $marca['id_permiso']; ?>">Eliminar</a>
            </div>
            </td>    

            </tr>
            
        <?php endforeach; ?>
        </tbody>
        </table>
</div>