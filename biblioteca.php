<?php
  require_once(__DIR__.'/admin/models/producto.php');
  require_once(__DIR__.'/admin/models/marca.php');
  $web= new Producto();
  $web2= new Marca();
  $id=isset($_GET['id'])?$_GET['id']:null;
  $marcas=$web2->leer($id);
  if(isset($_GET['id']) && ($_GET['id'] != null)){
    $productos=$web->leer($id);
  }
  else{
    $productos=$web->leer();
  }


  session_start();


/*

  if (isset($_SESSION) && !empty($_SESSION)) {
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
} else {
    echo 'No hay sesión activa o está vacía.';
}

*/

?>


<?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'agregado'): ?>
  <div class="alert alert-success text-center">
    Solicitud Iniciada ve al solicitudes y finalizala.
  </div>
<?php endif; ?>

<!doctype html>
<html lang="en">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Liter&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Liter&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="CSS/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="CSS/custom.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ConectaTEC©</title>
</head>

<body>
  <header>
    <div class="container_logo">
      <img src="IMAGES/log.png" width="300" alt="LOGO CONECTATEC">
    </div>
  </header>

  <div id="wrapper">
    <div class="container-fluid" style="padding: 0; margin:0; max-width: 100%;">
      <div class="row" style="max-width: 101%;">
        <div class="col-sm" style="margin: 0; padding: 0;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark navegacion" style="max-width: 100%;">
            <a class="navbar-brand" style="margin-left: 3%;" href="index.php"><span
                class="letra-logo">ConectaTEC</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="margin: 0; padding: 0;">
              <ul class="navbar-nav">
                <li class="nav-item active navegacion-item">
                  <a class="nav-link" href="index.php"><span class="navegacion-color-item">Inicio</span></a>
                </li>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="blog.php"><span class="navegacion-color-item">Blog</span></a>
                </li>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="about.php"><span class="navegacion-color-item">About</span></a>
                </li>


                <?php if(!$web->checar('Cliente')): ?>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="admin/login.php"><span class="navegacion-color-item">Login</span></a>
                </li>
                <?php endif; ?>

                <?php if($web->checar('Cliente')): ?>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="admin/login.php?accion=logout"><span class="navegacion-color-item">Cerrar</span></a>
                </li>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="admin/cuenta.php"><span class="navegacion-color-item">Cuenta</span></a>
                </li>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="admin/carrito.php"><span class="navegacion-color-item">Acciones</span></a>
                </li>
                <?php endif; ?>

                <li class="nav-item dropdown navegacion-item">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="navegacion-color-item">Mas</span>
                  </a>
                  <div class="dropdown-menu variant" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item variant-son" href="mentorias.php">Mentorias</a>
                    <a class="dropdown-item variant-son" href="materias.php">Materias</a>
                    <a class="dropdown-item variant-son" href="noticias.php">Noticias</a>
                    <a class="dropdown-item variant-son" href="biblioteca.php">Biblioteca</a>
                    <a class="dropdown-item variant-son" href="rendimiento.php">CalTEC</a>
                  </div>
                </li>
                <div class="redes-container">
                                    <div class="logos_tec">
                      <img  class="logo_c" src="IMAGES/inst1.svg" width="50" alt="LOGO ESMERALDA">
                      <img  class="logo_c" src="IMAGES/inst4.png" width="55" alt="LOGO ESMERALDA">
                  </div>
                  <div>
                    <div><img class="imagen-redes" src="IMAGES/wattsap1.png" alt="wattsap"></div>
                    <div><img class="imagen-redes" src="IMAGES/fac.png" alt="facebook"></div>
                    <div><img class="imagen-redes" src="IMAGES/ins.png" alt="inatagram"></div>
                  </div>
                </div>
              </ul>
            </div>
          </nav>
        </div>
      </div>



      <section class="about-header text-center text-white d-flex align-items-center justify-content-center" style="
            background: url('IMAGES/bib.jpg') center/cover no-repeat; 
            height: 350px;
            position: relative; margin-bottom: 5%;">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(34, 53, 17, 0.6);"></div>
        <div class="container position-relative">
            <h1 class="display-4 fw-bold">Recursos Bibliográficos</h1>
            <p class="lead">Recursos y fuentes de información para los estudiantes</p>
        </div>
      </section>

      
      <div class="row generic-container" style="text-align:center;">
          <div class="col-sm">
            <img src="IMAGES/van1.png" alt="SABORES" width="100%">
          </div>
          <div class="col-sm">
            <img src="IMAGES/conkal.jpg" alt="SABORES" width="100%">
          </div>
      </div>

      <section class="carrousel-productos">
        <div class="row">
          <div class="col-sm">

          </div>
        </div>
      </section>
      

      <div class="row generic-text-container" style="text-align: center; justify-content: center;">
        <span class="generic-font">Los mejores Productos para ti<?php  isset($_GET['id'])?    print('de la Marca - '.$productos[0]['marca'] ): '.' ?></span>
      </div>


      <div class="d-flex justify-content-center mt-4">
        <form action="productos.php" method="GET" class="d-flex align-items-center gap-3 p-3 bg-light rounded shadow-sm" style="max-width: 500px;">
            <select name="id" class="form-select" style="min-width: 200px;">
            <option disabled selected>Selecciona una marca</option>
            <?php foreach($marcas as $marca): ?>
                <option value='<?php echo $marca['id_marca']; ?>'><?php echo $marca['marca']; ?></option>
            <?php endforeach; ?>
                <option value=''><?php echo ("Todas las marcas"); ?></option>
            </select>
            <input type="submit" name="filtrar" value="Filtrar" class="btn btn-custom px-4 py-2 rounded-pill">
        </form>
        </div>

        <style>
        .btn-custom {
            background-color: white;
            color: black;
            border: 2px solid black;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: black;
            color: white;
        }
        </style>


      

<?php if($productos!=null): ?>
<div class="row" style="margin-top: 2rem; margin-bottom: 60px; margin-left: 2.5%; margin-right: 2.5%;background-image: url('IMAGES/fondo-madera-concepto-diferentes-origenes_185193-109343.jpg'); padding-top: 3%; border-radius: 1rem;">
<form action="pedido.php" method="POST">
  <div class="row justify-content-center g-4">
  <?php foreach($productos as $producto): ?>
  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <form action="pedido.php" method="POST">
      <div class="card h-100 shadow-lg border-0" style="background-color: #1c1c1c; color: white; border-radius: 1rem;">
        <img src="<?php echo 'uploads/'.$producto['fotografia']; ?>" class="card-img-top rounded-top" alt="Imagen de <?php echo $producto['producto']; ?>">
        <div class="card-body d-flex flex-column p-3">
          <h5 class="card-title fw-bold mb-2"><?php echo $producto['producto']; ?></h5>
          <p class="card-text mb-3"><?php echo $producto['descripcion']; ?></p>
          <span class="badge bg-success p-2 fs-6">Disponible</span>
          <input type="number" class="form-control form-control-sm mb-2"
            name="cantidadx[<?php echo $producto['id_producto']; ?>]"
            placeholder="Cantidad">

          <input type="hidden" name="productosx[<?php echo $producto['id_producto']; ?>]" value="<?php echo $producto['producto']; ?>">
          <input type="hidden" name="fotografiasx[<?php echo $producto['id_producto']; ?>]" value="<?php echo $producto['fotografia']; ?>">
          <input type="hidden" name="preciosx[<?php echo $producto['id_producto']; ?>]" value="<?php echo $producto['precio']; ?>">

          <div class="text-center mt-4">
            <input type="submit" class="btn btn-custom btn-lg px-5 py-2 shadow-sm rounded-pill" value="Solicitar Prestamo">
          </div>
        </div>
      </div>
    </form>
  </div>
<?php endforeach; ?>

  </div>
</form>
</div>
<?php endif; ?>





    </div>
<footer class="py-5"
  style="padding: 10%; background-color: black; color: white; font-weight: bolder; margin-top: 60px;">
  <div class="row">
    <div class="col-2">
      <h5 style="color:white !important;">Enlaces</h5>
      <ul class="nav flex-column" style="color: white;">
        <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-muted"><span
              class="etiqueta">Inicio</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Asesorías</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Recursos</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span class="etiqueta">Acerca del
              Proyecto</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Contacto</span></a></li>
      </ul>
    </div>

    <div class="col-2">
      <h5 style="color:white !important;">Funcionalidades</h5>
      <ul class="nav flex-column" style="color: white;">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Agendar Sesión</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Seguimiento Académico</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Reportes</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span class="etiqueta">Mentores</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span class="etiqueta">Calendario</span></a></li>
      </ul>
    </div>

    <div class="col-2">
      <h5 style="color:white !important;">Accesos</h5>
      <ul class="nav flex-column" style="color: white;">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Portal Estudiantes</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Portal Mentores</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Iniciar Sesión</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Guía de uso</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Soporte</span></a></li>
      </ul>
    </div>

    <div class="col-4 offset-1">
      <form>
        <h5 style="color:white !important;">Suscríbete a nuestras novedades académicas</h5>
        <p>Recibe noticias, convocatorias, eventos y actualizaciones de la plataforma de asesorías.</p>
        <div class="d-flex w-100 gap-2">
          <label for="newsletter1" class="visually-hidden">Correo electrónico</label>
          <input id="newsletter1" type="text" class="form-control" placeholder="correo@teccelaya.mx">
          <button class="btn btn-primary" type="button">Suscribirse</button>
        </div>
      </form>
    </div>
  </div>

  <div class="d-flex justify-content-between py-4 my-4 border-top">
    <p>TecNM Campus Celaya © 2025 - Plataforma de Asesorías Académicas. Todos los derechos reservados.</p>
    <ul class="list-unstyled d-flex">
      <li class="ms-3"><a class="link-light" href="#"><svg class="bi" width="24" height="24">
            <use xlink:href="#twitter"></use>
          </svg></a></li>
      <li class="ms-3"><a class="link-light" href="#"><svg class="bi" width="24" height="24">
            <use xlink:href="#instagram"></use>
          </svg></a></li>
      <li class="ms-3"><a class="link-light" href="#"><svg class="bi" width="24" height="24">
            <use xlink:href="#facebook"></use>
          </svg></a></li>
    </ul>
  </div>
</footer>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

<a href="./admin/carrito.php" class="btn btn-primary btn-lg shadow rounded-circle position-fixed" style="bottom: 20px; right: 20px; z-index: 1000;">
  Solicitudes
</a>


</html>