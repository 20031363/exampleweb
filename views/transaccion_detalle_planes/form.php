<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">
        <?php echo (isset($_GET['id'])) ? 'Modificar' : 'Nueva' ?> Inscripcion de Mentoria:
    </h1>

    <form action="transaccion_detalle_planes.php?accion=<?php echo (isset($_GET['id'])) ? 'modificar&id=' . $_GET['id'] : 'crear' ?>" method="POST">

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:3rem;" for="cantidad">Usuarios:</label>
            <input type="number" required min="1" name="datos[cantidad]" value="1" class="form-control" id="cantidad" placeholder="Cantidad" readonly>
        </div>


        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:3rem;" for="producto">Mentoria:</label>
            <select name="datos[id_plan]" id="producto" required class="form-control">
                <?php foreach($productos as $producto): ?>
                    <option value="<?php echo $producto['id_plan']; ?>" <?php echo (isset($_GET['id']) && $info['id_plan'] == $producto['id_plan']) ? 'selected' : ''; ?>>
                        <?php echo $producto['nombre_plan'].' | Empleado -> '.$producto['empleado_id']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:3rem;" for="transaccion">Inscripcion:</label>
            <select name="datos[id_transaccion]" id="transaccion" required class="form-control">
                <?php foreach($transacciones as $transaccion): ?>
                    <option value="<?php echo $transaccion['id_transaccion']; ?>" <?php echo (isset($_GET['id']) && $info['id_transaccion'] == $transaccion['id_transaccion']) ? 'selected' : ''; ?>>
                        <?php echo 'ID: '.$transaccion['id_transaccion'].' | Fecha: '.$transaccion['fecha']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="text-align:center; margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style="padding:1rem 3rem; font-size:1.4rem; font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/transaccion_detalle_planes.php'" class="btn btn-primary set_buton" style="background-color:red; padding:1rem 3rem; font-size:1.4rem; font-weight:normal;">Cancelar</button>
        </div>


        <input type="hidden" name="id_original" value="<?php echo (isset($info['id_transaccion']) ? $info['id_transaccion'] : 0); ?>">
        <input type="hidden" name="id2_original" value="<?php echo (isset($info['id_plan']) ? $info['id_plan'] : 0); ?>">

    </form>
</div>
