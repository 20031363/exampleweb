<div style="margin:5%;">
    <h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;"><?php echo (isset($_GET['id']))?'Modificar':'Nuevo'?>Libro:</h1>
   
    <?php 

        if(isset($_GET['id'])):
    
    ?>
    
    <div class="text-center">
            <img src="../uploads/<?php echo $info['fotografia']; ?>" class="rounded"  alt="PRODUCTO">
    </div>


    <?php endif; ?>

    <form action="producto.php?accion=<?php echo (isset($_GET['id']))?'modificar&id='.$_GET['id'] :'crear'?>" method="POST" enctype="multipart/form-data">
        <div class="form-group" style="margin:5%;">
        <label  class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="one">Nombre Libro:</label>
            <input type="text" required maxlength="50" value="<?php echo (isset($_GET['id']))? $info['producto']:'' ?>" name="datos[producto]" class="form-control" id="one" aria-describedby="emailHelp" placeholder="Nombre del libro o titulo"> 
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="two">Donativo:</label>
            <input type="text" required  value="<?php echo (isset($_GET['id']))? $info['precio']:'' ?>" name="datos[precio]" class="form-control" id="two" aria-describedby="emailHelp" placeholder="donativo es opcional"> 
        </div>

        <div class="form-group" style="margin:5%;">
        <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" for="three">Externo:</label>
            <select name="datos[id_marca]" id="three" required>
                <?php foreach($marcas as $marca): ?>                  
                    <option value="<?php echo $marca['id_marca']; ?>" <?php echo (isset($_GET['id']) && $info['id_marca']==$marca['id_marca'])?'selected':''; ?>><?php echo $marca['marca'];?> </option>
                <?php   endforeach;  ?>
            </select>
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;">Subir Fotografia:</label>
            <input type="file" class="form-control" name="fotografia">
        </div>

        <div class="form-group" style="margin:5%;">
            <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;">Descripcion:</label>
            <textarea name="datos[descripcion]" placefolder="AGREGA UNA DESCRIPCION AL PRODUCTO" rows="9" style="margin-left:2rem;" required>
                    <?php echo (isset($_GET['id']))? $info['descripcion']:''?>
            </textarea>
        </div>

        <div style="text-align:center;margin:5%;">
            <input type="submit" value="Guardar" name="enviar" class="btn btn-primary set_buton" style="padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
            <button type="button" onclick="window.location.href='./../admin/producto.php'" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Cancelar</button>
        </div>
    </form>
</div>





