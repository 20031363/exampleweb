<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;"><?php echo (isset($_GET['id']))?'Modificar':'Nuevo'?>Materia:</h1>
   
    <?php 

        if(isset($_GET['id'])):
    
    ?>
    
    <div class="text-center">
            <img src="../uploads/<?php echo $info['fotografia']; ?>" class="rounded"  alt="CURSO">
    </div>


    <?php endif; ?>

    <form action="curso.php?accion=<?php echo (isset($_GET['id']))?'modificar&id='.$_GET['id'] :'crear'?>" method="POST" enctype="multipart/form-data">
        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="one">Nombre Materia:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['curso']:'' ?>" name="datos[curso]" class="form-control" id="one" aria-describedby="emailHelp" placeholder="Nombre de la Materia"> 
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="two">Numero:</label>
            <input type="text" required  value="<?php echo (isset($_GET['id']))? $info['precio']:'' ?>" name="datos[precio]" class="form-control" id="two" aria-describedby="emailHelp" placeholder="Numero"> 
        </div>


        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="duracion">Creditos:</label>
            <input type="number" required value="<?php echo (isset($_GET['id'])) ? $info['duracion_horas'] : 1 ?>" name="datos[duracion_horas]" class="form-control" id="duracion" placeholder="Duración del curso en Horas"> 
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="usaer">Inscritos:</label>
            <input type="number" required value="<?php echo (isset($_GET['id'])) ? $info['inscritos'] : 0 ?>" name="datos[inscritos]" class="form-control" id="usaer" placeholder="Inscritos"> 
        </div>

        <div class="form-group" style="margin:5%;">
        <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="three">Docente(Imparte):</label>
            <select name="datos[empleado_id]" id="three" required>
                <?php foreach($marcas as $marca): ?>                  
                    <option value="<?php echo $marca['empleado_id']; ?>" <?php echo (isset($_GET['id']) && $info['empleado_id']==$marca['empleado_id'])?'selected':''; ?>><?php echo ($marca['empleado_id'].' '.$marca['nombre'].' '.$marca['primer_apellido']);?> </option>
                <?php   endforeach;  ?>
            </select>
        </div>



        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;">Link del Curso:</label>
            <input type="text" required maxlength="500" value="<?php echo (isset($_GET['id']))? $info['link']:'' ?>" name="datos[link]" class="form-control"  aria-describedby="emailHelp" placeholder="Link del Curso"> 
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;">Subir Fotografia:</label>
            <input type="file" class="form-control" name="fotografia">
        </div>


        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;">Descripcion:</label>
            <textarea name="datos[descripcion]" placefolder="AGREGA UNA DESCRIPCION AL PLAN" rows="7" required>
                 <?php echo (isset($_GET['id']))? $info['descripcion']:''?>
            </textarea>
        </div>


        <div style="text-align:center;margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style="padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/curso.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>





