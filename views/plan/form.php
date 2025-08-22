<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;"><?php echo (isset($_GET['id']))?'Modificar':'Nuevo'?>Mentoria:</h1>
   
    <?php 

        if(isset($_GET['id'])):
    
    ?>
    
    <div class="text-center">
            <img src="../uploads/<?php echo $info['fotografia']; ?>" class="rounded"  alt="PLAN">
    </div>


    <?php endif; ?>

    <form action="plan.php?accion=<?php echo (isset($_GET['id']))?'modificar&id='.$_GET['id'] :'crear'?>" method="POST" enctype="multipart/form-data">
        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="one">Nombre Mentoria:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['nombre_plan']:'' ?>" name="datos[nombre_plan]" class="form-control" id="one" aria-describedby="emailHelp" placeholder="Nombre de la Mnetoria o Tema"> 
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="two">Gasto Material:</label>
            <input type="text" required  value="<?php echo (isset($_GET['id']))? $info['precio']:'' ?>" name="datos[precio]" class="form-control" id="two" aria-describedby="emailHelp" placeholder="depende el material que se te pida"> 
        </div>


        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="duracion">Duración (días):</label>
            <input type="number" required value="<?php echo (isset($_GET['id'])) ? $info['duracion_dias'] : 1 ?>" name="datos[duracion_dias]" class="form-control" id="duracion" placeholder="Duración del plan en días"> 
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="usaer">Inscritos:</label>
            <input type="number" required value="<?php echo (isset($_GET['id'])) ? $info['usuarios_asignados'] : 0 ?>" name="datos[usuarios_asignados]" class="form-control" id="usaer" placeholder="inscritos"> 
        </div>

        <div class="form-group" style="margin:5%;">
        <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="three">Mentor a Cargo:</label>
            <select name="datos[empleado_id]" id="three" required>
                <?php foreach($marcas as $marca): ?>                  
                    <option value="<?php echo $marca['empleado_id']; ?>" <?php echo (isset($_GET['id']) && $info['empleado_id']==$marca['empleado_id'])?'selected':''; ?>><?php echo ($marca['empleado_id'].' '.$marca['nombre'].' '.$marca['primer_apellido']);?> </option>
                <?php   endforeach;  ?>
            </select>
        </div>



        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;">Subir PDF:</label>
            <input type="file" class="form-control" name="archivo_pdf">
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
            <button type="button" onclick="window.location.href='./../admin/plan.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>





