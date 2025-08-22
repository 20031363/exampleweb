<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">
        <?php echo (isset($_GET['id'])) ? 'Modificar' : 'Nueva' ?> Evaluacion de mentoria:
    </h1>

    <form action="resena_plan.php?accion=<?php echo (isset($_GET['id'])) ? 'modificar&id=' . $_GET['id'] : 'crear' ?>" method="POST" enctype="multipart/form-data">
        
        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="resena">Comentario:</label>
            <textarea required maxlength="500" name="datos[comentario]" class="form-control" id="resena" placeholder="Escribe un comentario"><?php echo (isset($_GET['id'])) ? $info['comentario'] : '' ?></textarea>
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="valoracion">Valoración:</label>
            <input type="number" required min="1" max="5" value="<?php echo (isset($_GET['id'])) ? $info['calificacion'] : '' ?>" name="datos[calificacion]" class="form-control" id="valoracion" placeholder="Valoración del 1 al 5">
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;font-size:2rem;" for="fecha_fin">Fecha de evaluacion:</label>
            <input type="date" required name="datos[fecha_resena]" value="<?php echo (isset($_GET['id'])) ? $info['fecha_resena'] : '' ?>" class="form-control" id="fecha_fin">
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="producto">Mentoria a evaluar:</label>
            <select name="datos[id_plan]" id="producto" required>
                <?php foreach($productos as $producto): ?>
                    <option value="<?php echo $producto['id_plan']; ?>" <?php echo (isset($_GET['id']) && $info['id_plan'] == $producto['id_plan']) ? 'selected' : ''; ?>>
                        <?php echo ('Mentoria: '.$producto['nombre_plan']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="cliente">Alumno:</label>
            <select name="datos[id_cliente]" id="cliente" required>
                <?php foreach($clientes as $cliente): ?>
                    <option value="<?php echo $cliente['id_cliente']; ?>" <?php echo (isset($_GET['id']) && $info['id_cliente'] == $cliente['id_cliente']) ? 'selected' : ''; ?>>
                        <?php echo ($cliente['id_cliente'].' '.$cliente['nombre'].' '.$cliente['primer_apellido'].' '.$cliente['segundo_apellido']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="text-align:center;margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style="padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/resena_plan.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>
