<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;"><?php echo (isset($_GET['id']))?'Modificar':'Nuevo'?>Permiso:</h1>
    <form action="permisos.php?accion=<?php echo (isset($_GET['id']))?'modificar&id='.$_GET['id'] :'crear'?>" method="POST">
        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="two">Permiso:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['permiso']:'' ?>" name="datos[permiso]" class="form-control" id="two" aria-describedby="emailHelp" placeholder="Nombre del Permiso"> 
        </div>
        <div style="text-align:center;margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style="padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/permisos.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>

