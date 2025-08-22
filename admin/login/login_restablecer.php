<!doctype html>
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
  <link href="../CSS/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="../CSS/custom.css" rel="stylesheet" type="text/css">
  <link href="../CSS/login.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Viñedo Emeralda©</title>
</head>

<body>
  <header>
    <div class="container_logo">
      <img src="../IMAGES/logo_v.png" width="300" alt="LOGO ESMERALDA">
    </div>
  </header>

  <div id="wrapper">
    <div class="container-fluid" style="padding: 0; margin:0; max-width: 100%;">
      <div class="row" style="max-width: 101%;">
        <div class="col-sm" style="margin: 0; padding: 0;">
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark navegacion" style="max-width: 100%;">
            <a class="navbar-brand" style="margin-left: 3%;" href="index.php"><span
                class="letra-logo">NutriMentor</span></a>
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
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="/nutrimentorx/admin/login.php"><span class="navegacion-color-item">Login</span></a>
                </li>
                <li class="nav-item dropdown navegacion-item">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="navegacion-color-item">Mas</span>
                  </a>
                  <div class="dropdown-menu variant" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item variant-son" href="../planes.php">Planes Nutricionales</a>
                    <a class="dropdown-item variant-son" href="../cursos.php">Cursos</a>
                    <a class="dropdown-item variant-son" href="../coaches.php">Coaches</a>
                    <a class="dropdown-item variant-son" href="#">Noticias</a>
                    <a class="dropdown-item variant-son" href="../productos.php">Productos Fit</a>
                    <a class="dropdown-item variant-son" href="../calculadora.php">Calculadora Calorias</a>
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
        </div>
      </div>
      

<!-- Hero Section -->
<section class="login-hero text-center text-white d-flex align-items-center justify-content-center" style="
  background: url('../IMAGES/heros.avif') center/cover no-repeat; 
  height: 400px;
  position: relative;">
  <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
  <div class="container position-relative">
    <h1 class="display-4 fw-bold">Bienvenido de Nuevo</h1>
    <p class="lead">Inicia sesión para acceder a tu plan nutricional personalizado y seguir tu progreso.</p>
  </div>
</section>

<!-- Formulario de Login -->
<section class="container-es py-5" style="margin-top: 5%;">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg">
        <div class="card-body p-5">
          <h2 class="text-center mb-4">Recueracion Contraseña</h2>
          <form method="POST" action="login.php?accion=nueva">
            <div class="mb-3">
              <label for="password" class="form-label">Nueva Contraseña</label>
              <input type="password" class="form-control" id="password" name="datos[contrasena]" placeholder="Ingresa tu contraseña" required>
            </div>
            <input type="hidden" name="datos[correo]" value="<?php echo $datos['correo']; ?>">
            <input type="hidden" name="datos[token]" value="<?php echo $datos['token']; ?>">
            <div class="d-grid gap-2">
              <input type="submit" class="btn btn-primary btn-lg"  name="enviar" value="Enviar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>




    </div>
    <footer class="py-5"
      style="padding: 10%; background-color: black; color: white; font-weight: bolder; margin-top: 60px;">
      <div class="row">
        <div class="col-2">
          <h5>Links</h5>
          <ul class="nav flex-column" style="color: white;">
            <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-muted"><span
                  class="etiqueta">Home</span></a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
                  class="etiqueta">Catalogos</span></a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
                  class="etiqueta">Calculadora</span></a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span class="etiqueta">Sobre
                  Nosotros</span></a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
                  class="etiqueta">Contacto</span></a></li>
          </ul>
        </div>

        <div class="col-2">
          <h5>Disponibles</h5>
          <ul class="nav flex-column" style="color: white;">
            <li class="nav-item mb-2"><a href="productos.php" class="nav-link p-0 text-muted"><span
                  class="etiqueta">Promociones</span></a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
                  class="etiqueta">Novedades</span></a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span class="etiqueta">Eventos
                  M</span></a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
                  class="etiqueta">Sobre Nosotros</span></a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span class="etiqueta">Eventos
                  S</span></a></li>
          </ul>
        </div>

        <div class="col-2">
          <h5>Mas info</h5>
          <ul class="nav flex-column" style="color: white;">
            <li class="nav-item mb-2" style="color: white;"><a href="#" class="nav-link p-0 text-muted"><span
                  class="etiqueta">Mas Info</span></a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
                  class="etiqueta">Servicios</span></a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
                  class="etiqueta">Login</span></a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
                  class="etiqueta">Coaches</span></a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
                  class="etiqueta">Otros</span></a></li>
          </ul>
        </div>

        <div class="col-4 offset-1">
          <form>
            <h5>Subscribete a nuestro panel de novedades</h5>
            <p>Prodras participar en eventos y obtenerdescuentos en nuestros Planes de Nutricion.</p>
            <div class="d-flex w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Correo de Contacto</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="ejempolo@vinedo.com">
              <button class="btn btn-primary" type="button">Suscribete</button>
            </div>
          </form>
        </div>
      </div>

      <div class="d-flex justify-content-between py-4 my-4 border-top">
        <p>NutriMentor© 2021 Company, Inc. Todos los derechos Reservados</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#twitter"></use>
              </svg></a></li>
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#instagram"></use>
              </svg></a></li>
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
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

</html>