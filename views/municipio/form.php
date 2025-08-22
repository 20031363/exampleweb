<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;"><?php echo (isset($_GET['id']))?'Modificar':'Nuevo'?>Municipio:</h1>
   
    <?php 

        if(isset($_GET['id'])):
    
    ?>
    

    <?php endif; ?>

    <form action="municipio.php?accion=<?php echo (isset($_GET['id']))?'modificar&id='.$_GET['id'] :'crear'?>" method="POST" enctype="multipart/form-data">
        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="one">Nombre Municipio:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['municipio']:'' ?>" name="datos[municipio]" class="form-control" id="one" aria-describedby="emailHelp" placeholder="Nombre del Municipio"> 
        </div>

        <div class="form-group" style="margin:5%;">
        <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="three">Estado:</label>
            <select name="datos[id_estado]" id="three" required>
                <?php foreach($marcas as $marca): ?>                  
                    <option value="<?php echo $marca['id_estado']; ?>" <?php echo (isset($_GET['id']) && $info['id_estado']==$marca['id_estado'])?'selected':''; ?>><?php echo $marca['estado'];?> </option>
                <?php   endforeach;  ?>
            </select>
        </div>



        <div style="text-align:center;margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style="padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/municipio.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>





