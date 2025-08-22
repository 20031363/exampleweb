<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;"><?php echo (isset($_GET['id']))?'Modificar':'Nuevo'?>Usuario:</h1>
    <form action="usuario.php?accion=<?php echo (isset($_GET['id']))?'modificar&id='.$_GET['id'] :'crear'?>" method="POST">

        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="ggg">Correo Electronico:</label>
            <input type="email" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['correo']:'' ?>" name="datos[correo]" class="form-control" id="ggg" aria-describedby="emailHelp" placeholder="Correo"> 
        </div>


        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="ffff">Password:</label>
            <input type="password" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['contrasena']:'' ?>" name="datos[contrasena]" class="form-control" id="ffff" aria-describedby="emailHelp" placeholder="Password"> 
        </div>

        <div style="text-align:center;margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style=" padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/usuario.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>

