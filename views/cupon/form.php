<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">
        <?php echo (isset($_GET['id'])) ? 'Modificar' : 'Nuevo' ?> Clave:
    </h1>
    <form action="cupon.php?accion=<?php echo (isset($_GET['id'])) ? 'modificar&id=' . $_GET['id'] : 'crear' ?>" method="POST">
        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="codigo">Clave:</label>
            <input type="text" required maxlength="20" name="datos[codigo_cupon]" value="<?php echo (isset($_GET['id'])) ? $info['codigo_cupon'] : '' ?>" class="form-control" id="codigo" placeholder="Ej. VERANO2025">
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="descuento">Clave Respaldo:</label>
            <input type="number" required min="1" max="100" name="datos[descuento_porcentaje]" value="<?php echo (isset($_GET['id'])) ? $info['descuento_porcentaje'] : '' ?>" class="form-control" id="descuento" placeholder="Ej. 10">
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="fecha_inicio">Fecha de Inicio:</label>
            <input type="date" required name="datos[fecha_inicio]" value="<?php echo (isset($_GET['id'])) ? $info['fecha_inicio'] : '' ?>" class="form-control" id="fecha_inicio">
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="fecha_fin">Fecha de Fin:</label>
            <input type="date" required name="datos[fecha_fin]" value="<?php echo (isset($_GET['id'])) ? $info['fecha_fin'] : '' ?>" class="form-control" id="fecha_fin">
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="usos_maximos">Usos Máximos:</label>
            <input type="number" required min="1" name="datos[usos_maximos]" value="<?php echo (isset($_GET['id'])) ? $info['usos_maximos'] : '' ?>" class="form-control" id="usos_maximos" placeholder="Ej. 100">
        </div>

        <div style="text-align:center;margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style="padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/cupon.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>
