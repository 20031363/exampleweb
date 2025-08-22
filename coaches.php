<?php
  require_once(__DIR__.'/admin/models/producto.php');
  require_once(__DIR__.'/admin/models/marca.php');
  $web= new Producto();
  $web2= new Marca();
?>

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
  <link href="CSS/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="CSS/custom.css" rel="stylesheet" type="text/css">
  <link href="CSS/coaches.css" rel="stylesheet" type="text/css">
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
                  <a class="nav-link" href="admin/carrito.php"><span class="navegacion-color-item">Carrito</span></a>
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
      
       
<section class="mentores-hero text-center text-white d-flex align-items-center justify-content-center" style="
    background: url('IMAGES/coad.avif') center/cover no-repeat; 
    height: 300px;
    position: relative; margin-bottom: 5%;">
  <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
  <div class="container position-relative">
    <h1 class="display-4 fw-bold">Nuestros Docentes y Mentores</h1>
    <p class="lead">Expertos comprometidos con tu crecimiento académico y profesional, brindándote apoyo personalizado en cada etapa.</p>
  </div>
</section>


  <!-- Catálogo de Docentes y Mentores -->
<section class="container-es py-5">
  <h2 class="text-center mb-5">Nuestros Docentes y Mentores</h2>
  <div class="row">
    <!-- Mentor 1 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/cc1.jpeg" class="card-img-top" alt="Mentor 1">
        <div class="card-body text-center">
          <h4 class="card-title">Ing. Ana López</h4>
          <p class="card-text">Especialista en Matemáticas y Física</p>
          <p class="card-text">Apoya a estudiantes en resolución de problemas y desarrollo de habilidades analíticas.</p>
          <a href="mentor-ana.php" class="btn btn-primary">Ver Perfil</a>
        </div>
      </div>
    </div>
    <!-- Mentor 2 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/cc1.jpeg" class="card-img-top" alt="Mentor 2">
        <div class="card-body text-center">
          <h4 class="card-title">Dr. Carlos Martínez</h4>
          <p class="card-text">Docente de Ingeniería en Sistemas</p>
          <p class="card-text">Experto en programación y desarrollo de software, con amplia experiencia en mentorías.</p>
          <a href="mentor-carlos.php" class="btn btn-primary">Ver Perfil</a>
        </div>
      </div>
    </div>
    <!-- Mentor 3 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/cc1.jpeg" class="card-img-top" alt="Mentor 3">
        <div class="card-body text-center">
          <h4 class="card-title">Mtra. María González</h4>
          <p class="card-text">Mentora en Habilidades Blandas y Liderazgo</p>
          <p class="card-text">Especialista en desarrollo personal, comunicación efectiva y apoyo emocional.</p>
          <a href="mentor-maria.php" class="btn btn-primary">Ver Perfil</a>
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- Catálogo de Docentes y Mentores - Área Académica -->
<section class="container-es py-5">
  <h2 class="text-center mb-5">Expertos en Apoyo Académico</h2>
  <div class="row">
    <!-- Mentor 1 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/cc4.jpeg" class="card-img-top" alt="Mentor 1">
        <div class="card-body text-center">
          <h4 class="card-title">Dra. Darla Sánchez</h4>
          <p class="card-text">Especialista en Matemáticas Aplicadas</p>
          <p class="card-text">Apoya a estudiantes en comprensión y aplicación de conceptos matemáticos complejos.</p>
          <a href="mentor-darla.php" class="btn btn-primary">Ver Perfil</a>
        </div>
      </div>
    </div>
    <!-- Mentor 2 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/cc4.jpeg" class="card-img-top" alt="Mentor 2">
        <div class="card-body text-center">
          <h4 class="card-title">Mtro. Aime Moreno</h4>
          <p class="card-text">Docente en Ciencias de la Computación</p>
          <p class="card-text">Guía en programación, algoritmos y desarrollo de software.</p>
          <a href="mentor-aime.php" class="btn btn-primary">Ver Perfil</a>
        </div>
      </div>
    </div>
    <!-- Mentor 3 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/cc4.jpeg" class="card-img-top" alt="Mentor 3">
        <div class="card-body text-center">
          <h4 class="card-title">Ing. Arturo Rojas</h4>
          <p class="card-text">Especialista en Ingeniería Eléctrica</p>
          <p class="card-text">Asesor en proyectos de electrónica y sistemas eléctricos.</p>
          <a href="mentor-arturo.php" class="btn btn-primary">Ver Perfil</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Catálogo de Docentes y Mentores - Área de Desarrollo Profesional y Personal -->
<section class="container-es py-5">
  <h2 class="text-center mb-5">Expertos en Desarrollo Profesional y Personal</h2>
  <div class="row">
    <!-- Mentor 1 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/cc4.jpeg" class="card-img-top" alt="Mentor 1">
        <div class="card-body text-center">
          <h4 class="card-title">Mtro. Pedro López</h4>
          <p class="card-text">Coach en Habilidades Blandas</p>
          <p class="card-text">Apoyo en comunicación, liderazgo y trabajo en equipo.</p>
          <a href="mentor-pedro.php" class="btn btn-primary">Ver Perfil</a>
        </div>
      </div>
    </div>
    <!-- Mentor 2 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/cc4.jpeg" class="card-img-top" alt="Mentor 2">
        <div class="card-body text-center">
          <h4 class="card-title">Dra. Carla Orlo</h4>
          <p class="card-text">Especialista en Gestión del Tiempo y Productividad</p>
          <p class="card-text">Consejos para optimizar el aprendizaje y balancear vida académica y personal.</p>
          <a href="mentor-carla.php" class="btn btn-primary">Ver Perfil</a>
        </div>
      </div>
    </div>
    <!-- Mentor 3 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/cc4.jpeg" class="card-img-top" alt="Mentor 3">
        <div class="card-body text-center">
          <h4 class="card-title">Mtra. Santiago González</h4>
          <p class="card-text">Mentor en Inteligencia Emocional</p>
          <p class="card-text">Apoya a estudiantes en manejo del estrés y desarrollo personal.</p>
          <a href="mentor-santiago.php" class="btn btn-primary">Ver Perfil</a>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Sección de Testimonios sobre Asesorías Académicas -->
<section class="testimonios-coaches py-5">
  <div class="container-es">
    <h2 class="text-center mb-5">Lo que Dicen Nuestros Estudiantes</h2>
    <div class="row">
      <!-- Testimonio 1 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <img src="IMAGES/t1.jpg" class="rounded-circle mb-3" alt="Testimonio 1" width="100" height="100">
            <h4 class="card-title">Alejandra Torres</h4>
            <p class="card-text">"Gracias a las asesorías personalizadas, mejoré mis calificaciones y ahora me siento más segura académicamente."</p>
            <div class="rating">
              ⭐⭐⭐⭐⭐
            </div>
          </div>
        </div>
      </div>
      <!-- Testimonio 2 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <img src="IMAGES/t1.jpg" class="rounded-circle mb-3" alt="Testimonio 2" width="100" height="100">
            <h4 class="card-title">Luis Ramírez</h4>
            <p class="card-text">"La plataforma me permitió agendar asesorías fácilmente y resolver mis dudas con profesores del campus."</p>
            <div class="rating">
              ⭐⭐⭐⭐⭐
            </div>
          </div>
        </div>
      </div>
      <!-- Testimonio 3 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <img src="IMAGES/t1.jpg" class="rounded-circle mb-3" alt="Testimonio 3" width="100" height="100">
            <h4 class="card-title">Daniela Mendoza</h4>
            <p class="card-text">"Antes usábamos varias plataformas. Ahora con esta herramienta integral, todo está más organizado y accesible."</p>
            <div class="rating">
              ⭐⭐⭐⭐⭐
            </div>
          </div>
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

</html>