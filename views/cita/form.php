<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">
        <?php echo (isset($_GET['id'])) ? 'Modificar' : 'Nueva' ?> Cita:
    </h1>

    <form action="cita.php?accion=<?php echo (isset($_GET['id'])) ? 'modificar&id=' . $_GET['id'] : 'crear' ?>" method="POST">


    <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="two">Titulo:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['titulo']:'' ?>" name="datos[titulo]" class="form-control" id="two" aria-describedby="emailHelp" placeholder="Titulo"> 
        </div>

    <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="resena">Descripcion:</label>
            <textarea required maxlength="500" name="datos[descripcion]" class="form-control" id="resena" placeholder="Escribe la descripcion"><?php echo (isset($_GET['id'])) ? $info['descripcion'] : '' ?></textarea>
        </div>


        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder; font-size:3rem;" for="fecha_cita">Fecha y Hora de la Cita:</label>
            <input type="datetime-local" required name="datos[fecha_cita]" class="form-control" id="fecha_cita"
                   value="<?php echo (isset($_GET['id'])) ? date('Y-m-d\TH:i', strtotime($info['fecha_cita'])) : '' ?>">
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder; font-size:3rem;" for="lugar">Lugar:</label>
            <select name="datos[id_lugar]" id="lugar" required>
                <?php foreach($lugares as $lugar): ?>
                    <option value="<?php echo $lugar['id_lugar']; ?>" <?php echo (isset($_GET['id']) && $info['id_lugar'] == $lugar['id_lugar']) ? 'selected' : ''; ?>>
                        <?php echo $lugar['lugar']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder; font-size:3rem;" for="cliente">Alumno:</label>
            <select name="datos[id_cliente]" id="cliente" required>
                <?php foreach($clientes as $cliente): ?>
                    <option value="<?php echo $cliente['id_cliente']; ?>" <?php echo (isset($_GET['id']) && $info['id_cliente'] == $cliente['id_cliente']) ? 'selected' : ''; ?>>
                        <?php echo $cliente['nombre'].' '.$cliente['primer_apellido'].' '.$cliente['segundo_apellido']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder; font-size:3rem;" for="empleado">Docente/Mentor:</label>
            <select name="datos[empleado_id]" id="empleado" required>
                <?php foreach($empleados as $empleado): ?>
                    <option value="<?php echo $empleado['empleado_id']; ?>" <?php echo (isset($_GET['id']) && $info['empleado_id'] == $empleado['empleado_id']) ? 'selected' : ''; ?>>
                        <?php echo $empleado['nombre'].' '.$empleado['primer_apellido'].' '.$empleado['segundo_apellido']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="text-align:center; margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style="padding:1rem 3rem; font-size:1.4rem; font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/cita.php'" class="btn btn-primary set_buton" style="background-color:red; padding:1rem 3rem; font-size:1.4rem; font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>
