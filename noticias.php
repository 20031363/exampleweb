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
  <link href="CSS/about.css" rel="stylesheet" type="text/css">
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
                class="letra-logo">ConectaTEC©</span></a>
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
      


 

     <!-- Sección de Noticias por Categoría -->
<div style="margin-top: 5%;" class="container-es py-5" style="margin-bottom: 3%;">
  <h2 class="text-center mb-5">Noticias por Categoría</h2>
  
  <!-- Actualizaciones Académicas -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0">Actualizaciones Académicas</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="IMAGES/nue.jpg" class="card-img-top" alt="Nueva planificación académica">
                <div class="card-body">
                  <h5 class="card-title">Nueva planificación académica para el semestre</h5>
                  <p class="card-text">Conoce las fechas clave y ajustes en el calendario escolar para un mejor seguimiento de tus actividades.</p>
                  <a href="#" class="btn btn-sm btn-primary">Leer más</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="IMAGES/calen.jpg" class="card-img-top" alt="Cambios en normativas institucionales">
                <div class="card-body">
                  <h5 class="card-title">Cambios en normativas institucionales</h5>
                  <p class="card-text">Entérate de las nuevas políticas para asesorías y seguimiento académico implementadas por la institución.</p>
                  <a href="#" class="btn btn-sm btn-primary">Leer más</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="IMAGES/ja.jpg" class="card-img-top" alt="Calendario de exámenes">
                <div class="card-body">
                  <h5 class="card-title">Calendario de exámenes y evaluaciones</h5>
                  <p class="card-text">Consulta las fechas oficiales para las evaluaciones parciales y finales del semestre actual.</p>
                  <a href="#" class="btn btn-sm btn-primary">Leer más</a>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center mt-3">
            <a href="#" class="btn btn-outline-primary">Ver todas las noticias académicas</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Capacitación y Talleres -->
  <div  class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header" style="background-color: #28a745; color: white;">
          <h4 class="mb-0">Capacitación y Talleres</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="IMAGES/tae.jpg" class="card-img-top" alt="Taller de estrategias de enseñanza">
                <div class="card-body">
                  <h5 class="card-title">Taller de estrategias de enseñanza innovadoras</h5>
                  <p class="card-text">Mejora tus técnicas pedagógicas con las últimas tendencias educativas y herramientas digitales.</p>
                  <a href="#" class="btn btn-sm btn-success">Leer más</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="IMAGES/uso.jpg" class="card-img-top" alt="Curso de uso de plataforma">
                <div class="card-body">
                  <h5 class="card-title">Curso práctico para el uso de la plataforma</h5>
                  <p class="card-text">Aprende a sacar el máximo provecho a las funcionalidades que ofrece el sistema de asesorías.</p>
                  <a href="#" class="btn btn-sm btn-success">Leer más</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="IMAGES/ab2.jpg" class="card-img-top" alt="Webinar de evaluación formativa">
                <div class="card-body">
                  <h5 class="card-title">Webinar sobre evaluación formativa efectiva</h5>
                  <p class="card-text">Descubre técnicas para evaluar el aprendizaje de manera continua y mejorar el acompañamiento académico.</p>
                  <a href="#" class="btn btn-sm btn-success">Leer más</a>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center mt-3">
            <a href="#" class="btn btn-outline-success">Ver todas las capacitaciones</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Innovación Educativa -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header" style="background-color: #17a2b8; color: white;">
          <h4 class="mb-0">Innovación Educativa</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="IMAGES/inco2.jpg" class="card-img-top" alt="Tecnologías en educación">
                <div class="card-body">
                  <h5 class="card-title">Incorporación de tecnologías en el aula</h5>
                  <p class="card-text">Explora cómo las nuevas herramientas digitales están transformando la enseñanza y el aprendizaje.</p>
                  <a href="#" class="btn btn-sm btn-info">Leer más</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="IMAGES/inco.jpg" class="card-img-top" alt="Educación híbrida">
                <div class="card-body">
                  <h5 class="card-title">Modelos híbridos de educación</h5>
                  <p class="card-text">Conoce las ventajas y retos de combinar la educación presencial y en línea para una mejor experiencia académica.</p>
                  <a href="#" class="btn btn-sm btn-info">Leer más</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="IMAGES/inco3.jpg" class="card-img-top" alt="Analítica de datos en educación">
                <div class="card-body">
                  <h5 class="card-title">Analítica de datos para mejorar resultados</h5>
                  <p class="card-text">Cómo el análisis de datos académicos puede apoyar la toma de decisiones para potenciar el aprendizaje.</p>
                  <a href="#" class="btn btn-sm btn-info">Leer más</a>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center mt-3">
            <a href="#" class="btn btn-outline-info">Ver todas las noticias de Innovación</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Sección de Videos Destacados -->
<div style="margin-top: 5%;" class="container-es bg-light py-5" style="margin-bottom: 3%;">
  <h2 class="text-center mb-5">Videos Destacados</h2>
  <div class="row">

    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/hIfAs1Bg-wE" allowfullscreen title="Tutorial uso plataforma asesorías"></iframe>
        </div>
        <div class="card-body">
          <h5 class="card-title">Tutorial: Cómo usar la plataforma de asesorías</h5>
          <p class="card-text">Guía paso a paso para docentes y estudiantes sobre cómo agendar, compartir recursos y dar seguimiento.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/XbVMNkNpx7M" allowfullscreen title="Técnicas efectivas de estudio"></iframe>
        </div>
        <div class="card-body">
          <h5 class="card-title">Técnicas efectivas de estudio y organización</h5>
          <p class="card-text">Consejos para que los estudiantes optimicen su tiempo y mejoren su rendimiento académico.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/us_NuULdpeE" allowfullscreen title="Capacitación para mentores"></iframe>
        </div>
        <div class="card-body">
          <h5 class="card-title">Capacitación para mentores: Estrategias de acompañamiento</h5>
          <p class="card-text">Claves para mejorar la comunicación y el apoyo a estudiantes durante las asesorías.</p>
        </div>
      </div>
    </div>

  </div>
  <div class="text-center">
    <a href="#" class="btn btn-primary">Ver más videos</a>
  </div>
</div>


        <!-- Sección de Podcasts -->
<div style="margin-top: 5%;" class="container-es py-5" style="margin-bottom: 3%;">
  <h2 class="text-center mb-5">Podcasts Educativos y de Asesoría Académica</h2>
  <div class="row">

    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="IMAGES/podcast_nutricion.jpeg" class="img-fluid rounded-start h-100" alt="Podcast Educación">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Estrategias para una enseñanza efectiva en base a la buena alimentacion en estudiantes</h5>
              <p class="card-text">Exploramos técnicas y buenas prácticas para mejorar la experiencia educativa y el aprendizaje.</p>
              <audio controls style="width: 100%">
                <source src="AUDIOS/podcast_nutricion.mp3" type="audio/mpeg">
                Tu navegador no soporta el elemento de audio.
              </audio>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="IMAGES/podcast_fitness.jpg" class="img-fluid rounded-start h-100" alt="Podcast Acompañamiento Académico">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Acompañamiento y motivación para estudiantes</h5>
              <p class="card-text">Consejos prácticos para mentores y docentes para apoyar a los estudiantes en su desarrollo académico.</p>
              <audio controls style="width: 100%">
                <source src="AUDIOS/podcast_fitness.mp3" type="audio/mpeg">
                Tu navegador no soporta el elemento de audio.
              </audio>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="text-center">
    <a href="#" class="btn btn-outline-primary">Explorar más podcasts</a>
  </div>
</div>







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