<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;"><?php echo (isset($_GET['id']))?'Modificar':'Nueva'?> Actor:</h1>
    <form action="marca.php?accion=<?php echo (isset($_GET['id']))?'modificar&id='.$_GET['id'] :'crear'?>" method="POST">
        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="two">Nombre:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['first_name']:'' ?>" name="datos[first_name]" class="form-control" id="two" aria-describedby="emailHelp" placeholder="Nombre del Externo"> 
        </div>

        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="dddddd">Apellido:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['last_name']:'' ?>" name="datos[last_name]" class="form-control" id="dddddd" aria-describedby="emailHelp" placeholder="Nombre del Externo"> 
        </div>

        <div style="text-align:center;margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style="padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/marca.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>

