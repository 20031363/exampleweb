    
    <div style="align-items:center;text-align:center;margin-top:5%;margin-bottom:5%;">
        <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">Usuarios:</h1>
    </div>

    

<div style="place-items:center; align-items:center; text-align:center; margin:5%; ">
        <table class="table" style="font-size:1.3rem; font-weight:bolder;border-color:black;">
        <thead>
            <tr>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">ID_Usuario</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Correo</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Password</th>
            <th scope="col" style="background-color: rgb(33, 46, 37)!important; color:white;">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($marca_a as $marca): ?>

            <tr>
            <th scope="row"><?php echo $marca['id_usuario']; ?></th>


            <td><?php echo $marca['correo'] ?></td>
            <td><?php echo md5($marca['contrasena']) ?></td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
               --
            </div>
            </td>    

            </tr>
            
        <?php endforeach; ?>
        </tbody>
        </table>
</div>