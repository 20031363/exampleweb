<div style="margin:5%;">
    <h1 class="generic-font" style="color:black; font-weight:bolder;text-align:center;"><?php echo (isset($_GET['id']))?'Modificar':'Nueva'?>Estado:</h1>
    <form action="estado.php?accion=<?php echo (isset($_GET['id']))?'modificar&id='.$_GET['id'] :'crear'?>" method="POST">
        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color:black; font-weight:bolder;text-align:center;font-size:3rem;" for="two">Estado:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['estado']:'' ?>" name="datos[estado]" class="form-control" id="two" aria-describedby="emailHelp" placeholder="Nombre del estado"> 
        </div>
        <div style="text-align:center;margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style="padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/estado.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>
