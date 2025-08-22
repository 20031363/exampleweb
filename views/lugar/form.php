<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;">
        <?php echo (isset($_GET['id'])) ? 'Modificar' : 'Nuevo' ?> Lugar:
    </h1>

    <form action="lugar.php?accion=<?php echo (isset($_GET['id'])) ? 'modificar&id=' . $_GET['id'] : 'crear' ?>" method="POST" enctype="multipart/form-data">
        
        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="one">Nombre Lugar:</label>
            <input type="text" required maxlength="100" value="<?php echo (isset($_GET['id'])) ? $info['lugar'] : '' ?>" name="datos[lugar]" class="form-control" id="one" placeholder="Nombre del Lugar">
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="lat">Latitud:</label>
            <input type="number" step="any" min="-90" max="90" required value="<?php echo (isset($_GET['id'])) ? $info['latitud'] : '' ?>" name="datos[latitud]" class="form-control" id="lat" placeholder="Latitud del Lugar">
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="lng">Longitud:</label>
            <input type="number" step="any" min="-180" max="180" required value="<?php echo (isset($_GET['id'])) ? $info['longitud'] : '' ?>" name="datos[longitud]" class="form-control" id="lng" placeholder="Longitud del Lugar">
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="muni">Municipio:</label>
            <select name="datos[id_municipio]" id="muni" required>
                <?php foreach($municipios as $municipio): ?>                  
                    <option value="<?php echo $municipio['id_municipio']; ?>" <?php echo (isset($_GET['id']) && $info['id_municipio'] == $municipio['id_municipio']) ? 'selected' : ''; ?>>
                        <?php echo $municipio['municipio']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="text-align:center;margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style="padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/lugar.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>
