<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;"><?php echo (isset($_GET['id']))?'Modificar':'Nuevo'?> Alumno:</h1>
    <form action="cliente.php?accion=<?php echo (isset($_GET['id']))?'modificar&id='.$_GET['id'] :'crear'?>" method="POST">

        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="a">Nombre:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['nombre']:'' ?>" name="datos[nombre]" class="form-control" id="a" aria-describedby="emailHelp" placeholder="Nombre del cliente"> 
        </div>

        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="b">Primer Apellido:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['primer_apellido']:'' ?>" name="datos[primer_apellido]" class="form-control" id="b" aria-describedby="emailHelp" placeholder="Primer Apellido"> 
        </div>

        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="c">Segundo Apellido:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['segundo_apellido']:'' ?>" name="datos[segundo_apellido]" class="form-control" id="c" aria-describedby="emailHelp" placeholder="Segundo Apellido"> 
        </div>


        <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;"><?php echo (isset($_GET['id']))?'Modificar':'Generar'?> Datos de Acceso:</h1>

        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;"for="ggg">Correo Electronico:</label>
            <input type="email" required maxlength="50" value="<?php echo (isset($_GET['id']))? $extra_info['correo']:'' ?>" name="datos[correo]" class="form-control" id="ggg" aria-describedby="emailHelp" placeholder="Correo"> 
        </div>


        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;"for="ffff">Password:</label>
            <input type="password" required maxlength="50" value="<?php echo (isset($_GET['id']))? $extra_info['contrasena']:'' ?>" name="datos[contrasena]" class="form-control" id="ffff" aria-describedby="emailHelp" placeholder="Password"> 
        </div>

        <input type="hidden" name="datos[id_usuario]" value="<?php echo (isset($_GET['id']))? $extra_info['id_usuario']:'0' ?>">

        <div style="text-align:center;margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style="padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/cliente.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>

