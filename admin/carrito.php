<?php
  require_once(__DIR__.'/models/producto.php');
  require_once(__DIR__.'/models/marca.php');
  $web= new Producto();
  $web2= new Marca();

if (!$web->checar('Cliente')) {
    header('Location: /conectatec/index.php?error=acceso_denegado');
    exit;
}



?>


<?php

session_start();


?>





<?php 
require_once(__DIR__.'/../admin/model.php');
$app = new Model();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Quicksand:wght@300..700&display=swap"
    rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Liter&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Liter&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="./../CSS/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="./../CSS/custom.css" rel="stylesheet" type="text/css">
  <link href="./../CSS/carrito.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ConectaTEC</title>
  <style>
  body {
    color: black !important;
  }
  p{
    color: black !important;
  }
  h1,h2,h3,h4,h5,h6{
    color: black !important;
  }
</style>

</head>


<body>

    <header>
        <div class="container_logo">
          <img src="./../IMAGES/log.png" width="300" alt="LOGO ESMERALDA">
        </div>
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
                  <a class="nav-link" href="../index.php"><span class="navegacion-color-item">Inicio</span></a>
                </li>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="../blog.php"><span class="navegacion-color-item">Blog</span></a>
                </li>


                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="../about.php"><span class="navegacion-color-item">About</span></a>
                </li>

                <?php if(!$web->checar('Cliente')): ?>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="login.php"><span class="navegacion-color-item">Login</span></a>
                </li>
                <?php endif; ?>

                <?php if($web->checar('Cliente')): ?>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="login.php?accion=logout"><span class="navegacion-color-item">Cerrar</span></a>
                </li>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="cuenta.php"><span class="navegacion-color-item">Cuenta</span></a>
                </li>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="carrito.php"><span class="navegacion-color-item">Acciones</span></a>
                </li>
                <?php endif; ?>

                <li class="nav-item dropdown navegacion-item">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="navegacion-color-item">Mas</span>
                  </a>
                  <div class="dropdown-menu variant" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item variant-son" href="../mentorias.php">Mentorias</a>
                    <a class="dropdown-item variant-son" href="../materias.php">Materias</a>
                    <a class="dropdown-item variant-son" href="../noticias.php">Noticias</a>
                    <a class="dropdown-item variant-son" href="../biblioteca.php">Biblioteca</a>
                    <a class="dropdown-item variant-son" href="../rendimiento.php">CalTEC</a>
                  </div>
                </li>
                <div class="redes-container">
                  <div>
                    <div><img class="imagen-redes" src="../IMAGES/wattsap1.png" alt="wattsap"></div>
                    <div><img class="imagen-redes" src="../IMAGES/fac.png" alt="facebook"></div>
                    <div><img class="imagen-redes" src="../IMAGES/ins.png" alt="inatagram"></div>
                  </div>
                </div>
              </ul>
            </div>
          </nav>
    </header>


    <div class="container-es">
        <h1 class="mb-5 text-center" style="font-family:'Quicksand', serif; color:rgb(34, 53, 17);">
          Acciones / Solicitudes
        </h1>

  <?php
  $total = 0;

  function mostrarProducto($producto, $tipo,$other) {
      global $total;
      $total += $producto['precio'];
      $imagenPath = '../uploads/' . htmlspecialchars($producto['imagen']);
      $nombre = htmlspecialchars($producto['nombre']);
      $precio = number_format($producto['precio'], 2);
      if ($other=="Libro" || $other=="Mentoria"){
        $mjs="Requerimiento o Aprox inverion por material (Mentorias son gratis solo son costos del material que posiblemente invertiras): ".$precio;
      }
      else{
        $mjs="";
      }
      echo <<<HTML
      <div class="card mb-4 carrito-item">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="$imagenPath" class="card-img-top" alt="$nombre">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">$nombre</h5>
              <p class="card-text">Tipo: $other</p>
              <p class="card-text precio">$mjs</p>
              <form method="post" action="eliminar.php">
                <input type="hidden" name="tipo" value="$tipo">
                <input type="hidden" name="id" value="{$producto['id']}">
                <button type="submit" class="btn btn-outline-primary">Eliminar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
HTML;
  }

  if (!empty($_SESSION['planes'])) {
      foreach ($_SESSION['planes'] as $plan) {
          mostrarProducto($plan, 'planes','Mentoria');
      }
  }

  if (!empty($_SESSION['cursos'])) {
      foreach ($_SESSION['cursos'] as $curso) {
          mostrarProducto($curso, 'cursos','Materias');
      }
  }
  ?>


<?php
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $producto) {
        $subtotal = $producto['precio'] * $producto['cantidad'];
        $total += $subtotal;
        $imagenPath = '../uploads/' . htmlspecialchars($producto['imagen']);
        $nombre = htmlspecialchars($producto['nombre']);
        $precio = number_format($producto['precio'], 2);
        $cantidad = intval($producto['cantidad']);
        $subtotalFormatted = number_format($subtotal, 2);
        echo <<<HTML
        <div class="card mb-4 carrito-item">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="$imagenPath" class="card-img-top" alt="$nombre">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">$nombre</h5>
                <p class="card-text">Tipo: Solicitud de Libro</p>
                <form method="post" action="eliminar.php">
                  <input type="hidden" name="tipo" value="carrito">
                  <input type="hidden" name="id" value="{$producto['id']}">
                  <button type="submit" class="btn btn-outline-primary">Eliminar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
HTML;
    }
}
?>



  <!-- Total -->
  <div class="text-end mt-4">
    <a class="btn btn-primary mt-2" href="finalizar_all.php?total=<?php echo number_format($total, 2); ?>">Proceder al Inscripcion o Solicitud</a>
  </div>
</div>



    <div style="background-color: rgb(33, 46, 37)!important; color: white; font-weight:bold; text-align:center;justify-content:center;align-items:center;padding-top:3%;padding-bottom:3%;">
<div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top" style="margin-left:5%;margin-right:5%;padding: 0%; background-color: rgb(33, 46, 37)!important;">
    <p class="col-md-4 mb-0 text-body-secondary" style="color:white !important; font-size:1rem !important; font-weight:bold !important; text-align:center !important; background-color: rgb(33, 46, 37)!important;">ConectaTEC© 2025 Company, Inc</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-md-4 justify-content-end" style="margin-right:0;">
      <li class="nav-item stoic"><a href="#" class="nav-link px-2 text-body-secondary stoic"><span style="text-align:center !important;color:white !important;">Home</span></a></li>
      <li class="nav-item stoic"><a href="#" class="nav-link px-2 text-body-secondary"><span style="text-align:center !important;color:white !important;"> Features</span></a></li>
      <li class="nav-item stoic"><a href="#" class="nav-link px-2 text-body-secondary"><span style="text-align:center !important;color:white !important;">Pricing</span></a></li>
      <li class="nav-item stoic"><a href="#" class="nav-link px-2 text-body-secondary"><span style="text-align:center !important;color:white !important;">FAQs</span></a></li>
      <li class="nav-item stoic"><a href="#" class="nav-link px-2 text-body-secondary"><span style="text-align:center !important;color:white !important;">About</span></a></li>
    </ul>
</div>
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
</html>

