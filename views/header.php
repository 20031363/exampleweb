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


              <?php if($app->checar('Nutricionista') || $app->checar('Coach') || $app->checar('Doctor')): ?>
                <li class="nav-item active navegacion-item">
                  <a class="nav-link" href="panel.php"><span class="navegacion-color-item">Home</span></a>
                </li>
              <?php endif; ?>


                <?php if($app->checar('Admin')): ?>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="index.php"><span class="navegacion-color-item">Dashboard</span></a>
                </li>
                <?php endif; ?>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="login.php?accion=logout"><span class="navegacion-color-item">Cerrar</span></a>
                </li>
                <li class="nav-item dropdown navegacion-item">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="navegacion-color-item">Catalogos</span>
                  </a>
                  <div class="dropdown-menu variant" aria-labelledby="navbarDropdownMenuLink">
                  <?php if($app->checar('Admin')): ?>
                    <a class="dropdown-item variant-son" href="../admin/marca.php">Externos</a>
                  <?php endif; ?>
                    <a class="dropdown-item variant-son" href="../admin/producto.php">Libros</a>
                    <a class="dropdown-item variant-son" href="../admin/curso.php">Materias</a>
                    <a class="dropdown-item variant-son" href="../admin/plan.php">Mentorias</a>
                    <a class="dropdown-item variant-son" href="../admin/cupon.php">Claves</a>
                    <?php if($app->checar('Admin')): ?>
                    <a class="dropdown-item variant-son" href="../admin/estado.php">Estado</a>
                    <a class="dropdown-item variant-son" href="../admin/municipio.php">Municipio</a>
                    <?php endif; ?>
                    <a class="dropdown-item variant-son" href="../admin/lugar.php">Lugares</a>
                    <a class="dropdown-item variant-son" href="../admin/cita.php">Citas</a>
                    <a class="dropdown-item variant-son" href="../admin/resena_producto.php">Reseñas Libro</a>
                    <a class="dropdown-item variant-son" href="../admin/resena_plan.php">Evaluacion Mentorias</a>
                    <a class="dropdown-item variant-son" href="../admin/resena_curso.php">Evaluacion Materias</a>
                    <?php if($app->checar('Admin')): ?>
                    <a class="dropdown-item variant-son" href="../admin/cliente.php">Alumnos</a>
                    <a class="dropdown-item variant-son" href="../admin/empleado.php">Personal</a>
                    <a class="dropdown-item variant-son" href="../admin/transaccion.php">Transaccion</a>
                    <a class="dropdown-item variant-son" href="../admin/transaccion_detalle.php">Transaciones Libros</a>
                    <a class="dropdown-item variant-son" href="../admin/transaccion_detalle_planes.php">Incripciones Mentorias</a>
                    <a class="dropdown-item variant-son" href="../admin/transaccion_detalle_cursos.php">Incripciones Materias</a>
                    <?php endif; ?>
                  </div>
                </li>
                <?php if($app->checar('Admin')): ?>
                <li class="nav-item dropdown navegacion-item">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="navegacion-color-item">Accesos</span>
                  </a>
                  <div class="dropdown-menu variant" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item variant-son" href="../admin/usuario.php">Usuarios</a>
                    <a class="dropdown-item variant-son" href="../admin/usuarios_roles.php">Ususarios_Roles</a>
                    <a class="dropdown-item variant-son" href="../admin/roles.php">Roles</a>
                    <a class="dropdown-item variant-son" href="../admin/permisos.php">Permisos</a>
                  </div>
                </li>
                <?php  endif; ?>
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