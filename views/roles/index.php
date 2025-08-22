    
    <div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;">
        <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Roles:</h1>
        <a href="roles.php?accion=crear" class="btn btn-success botones-genf">Nuevo Rol</a>
    </div>

    

<div style="place-items:center; align-items:center; text-align:center; margin:5%; ">
        <table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">
        <thead>
            <tr>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">ID_Rol</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Roles</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Active</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($marca_a as $marca): ?>

            <tr>
            <th scope="row"><?php echo $marca['id_rol']; ?></th>
            <td><?php echo $marca['rol']; ?></td>
            <td><?php echo $marca['Activa_UR']; ?></td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-primary botones-genf" href="roles.php?accion=modificar&id=<?php echo $marca['id_rol']; ?>">Modificar</a>
                <a class="btn btn-danger botones-genf" href="roles.php?accion=eliminar&id=<?php echo $marca['id_rol']; ?>">Eliminar</a>
            </div>
            </td>    

            </tr>
            
        <?php endforeach; ?>
        </tbody>
        </table>
</div>