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
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome (para iconos) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Bootstrap JS (opcional para tooltips) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <link href="./../CSS/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="./../CSS/custom.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ConectaTEC©Administrador</title>
</head>


<body>

    <header>
        <div class="container_logo">
          <img src="./../IMAGES/log.png" width="300" alt="LOGO ESMERALDA">
        </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navegacion" style="max-width: 100%;">
            <a class="navbar-brand" style="margin-left: 3%;" href="#"><span
                class="letra-logo">ConectaTEC©Admin</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="margin: 0; padding: 0;">
              <ul class="navbar-nav">

              <?php if($app->checar('Admin')): ?>
                <li class="nav-item active navegacion-item">
                  <a class="nav-link" href="index.php"><span class="navegacion-color-item">Home</span></a>
                </li>
              <?php endif; ?>




                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="../index.php"><span class="navegacion-color-item">Cerrar</span></a>
                </li>
                <div class="redes-container">
                  <div>
                    <div><img class="imagen-redes" src="./../IMAGES/wattsap1.png" alt="wattsap"></div>
                    <div><img class="imagen-redes" src="./../IMAGES/fac.png" alt="facebook"></div>
                    <div><img class="imagen-redes" src="./../IMAGES/ins.png" alt="inatagram"></div>
                  </div>
                </div>
              </ul>
            </div>
          </nav>
    </header>