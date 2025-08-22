<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;"><?php echo (isset($_GET['id']))?'Modificar':'Nuevo'?> Docente/Mentor:</h1>
    <form action="empleado.php?accion=<?php echo (isset($_GET['id']))?'modificar&id='.$_GET['id'] :'crear'?>" method="POST">

        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="a">Nombre:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['nombre']:'' ?>" name="datos[nombre]" class="form-control" id="a" aria-describedby="emailHelp" placeholder="Nombre del docente o mentor"> 
        </div>

        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="b">Primer Apellido:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['primer_apellido']:'' ?>" name="datos[primer_apellido]" class="form-control" id="b" aria-describedby="emailHelp" placeholder="Primer Apellido"> 
        </div>

        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="c">Segundo Apellido:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['segundo_apellido']:'' ?>" name="datos[segundo_apellido]" class="form-control" id="c" aria-describedby="emailHelp" placeholder="Segundo Apellido"> 
        </div>


        <div class="form-group" style="margin:5%;">
        <label  class="generic-font"style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="d">Fecha Nacimiento:</label>
            <input type="date" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['nacimiento']:'' ?>" name="datos[nacimiento]" class="form-control" id="d" aria-describedby="emailHelp" placeholder="Fecha de Nacimiento"> 
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="fecha_inicio">Fecha de Gestion:</label>
            <input type="date" required name="datos[fecha_contratacion]" value="<?php echo (isset($_GET['id'])) ? $info['fecha_contratacion'] : '' ?>" class="form-control" id="fecha_inicio">
        </div>

        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="e">Rfc(13):</label>
            <input type="text" required minlength="13" maxlength="13" value="<?php echo (isset($_GET['id']))? $info['rfc']:'' ?>" name="datos[rfc]" class="form-control" id="e" aria-describedby="emailHelp" placeholder="RFC"> 
        </div>

        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="tel">Telefono(Max 10 con lada):</label>
            <input type="number" required minlength="10" maxlength="10" value="<?php echo (isset($_GET['id']))? $info['telefono']:'' ?>" name="datos[telefono]" class="form-control" id="tel" aria-describedby="emailHelp" placeholder="caracteres 10-20"> 
        </div>

        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;"for="f">Curp(18):</label>
            <input type="text" required minlength="18" maxlength="18" value="<?php echo (isset($_GET['id']))? $info['curp']:'' ?>" name="datos[curp]" class="form-control" id="f" aria-describedby="emailHelp" placeholder="CURP"> 
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


        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="muni">Rol:</label>
            <select name="datos[id_rol]" id="muni" required>
                <?php foreach($roles_em as $rol_e): ?>     
                    <?php if(!($rol_e['rol'] == "Cliente" or $rol_e['rol'] == "cliente" or $rol_e['id_rol'] == 1)): ?>             
                    <option value="<?php echo $rol_e['id_rol']; ?>" <?php echo (isset($_GET['id']) && $extra_info['id_rol'] == $rol_e['id_rol']) ? 'selected' : ''; ?>>
                        <?php echo $rol_e['rol']; ?>
                    </option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="hidden" name="datos[id_usuario]" value="<?php echo (isset($_GET['id']))? $extra_info['id_usuario']:'0' ?>">

        <div style="text-align:center;margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style="padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/empleado.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>

