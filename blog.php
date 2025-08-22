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
  <link href="CSS/custom_2.css" rel="stylesheet" type="text/css">
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
      


      <section class="blog-header text-center text-white d-flex align-items-center justify-content-center" style="
              background: url('IMAGES/acadec.webp') center/cover no-repeat; 
              height: 350px;
              position: relative;">
          <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(34, 53, 17, 0.6);"></div>
          <div class="container position-relative">
              <h1 class="display-4 fw-bold"><span class="hg">Blog Académico</span></h1>
              <p class="lead">Descubre artículos, consejos y recursos educativos diseñados para mejorar tu rendimiento académico, organizar tus asesorías y aprovechar al máximo tu experiencia universitaria.</p>
          </div>
      </section>


  
      <!-- Contenido del Blog -->
      <div class="container-es" style="margin-top: 5%;padding: 6%;padding-bottom: 0%;margin-bottom: 5%;">
        <div class="row">
          <div class="col-md-8">
            <div class="card mb-4">
              <img src="IMAGES/efec.webp" class="card-img-top" alt="Artículo 1">
              <div class="card-body">
                <h2 class="card-title">Beneficios de una Asesoría Académica Efectiva</h2>
                <p class="card-text">"Descubre cómo una asesoría académica bien estructurada puede mejorar tu desempeño a largo plazo, brindándote mayor claridad, confianza y motivación en tu trayectoria estudiantil."</p>
                <a href="#" class="btn btn-dark">Leer más</a>
              </div>
            </div>
  
            <div class="card mb-4">
              <img src="IMAGES/efec2.jpg" class="card-img-top" alt="Artículo 2">
              <div class="card-body">
                <h2 class="card-title">5 Recursos educativos que debes incluir en tu rutina de estudio</h2>
                <p class="card-text">Conoce los mejores recursos educarivos que no pueden faltar en tu rutina para obtener mejores notas y elevar tu nivel de comprensión.</p>
                <a href="#" class="btn btn-dark">Leer más</a>
              </div>
            </div>
          </div>
  
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <h4 class="card-title">Enfoques</h4>
                <ul class="list-unstyled">
                  <li><a href="#" class="text-decoration-none">Mentorías y Tutorías</a></li>
                  <li><a href="#" class="text-decoration-none">Acompañamiento Académico</a></li>
                  <li><a href="#" class="text-decoration-none">Estrategias de Estudio</a></li>
                  <li><a href="#" class="text-decoration-none">Recursos y Herramientas</a></li>
                  <li><a href="#" class="text-decoration-none">Gestión del Tiempo</a></li>
                </ul>
              </div>
            </div>
  
            <div class="card mb-4">
              <div class="card-body">
                <h4 class="card-title">Artículos Populares</h4>
                <ul class="list-unstyled">
                  <li><a href="#" class="text-decoration-none">*La Importancia del Seguimiento Académico</a></li>
                  <li><a href="#" class="text-decoration-none">*Hábitos que Mejoran tu Rendimiento Académico</a></li>
                  <li><a href="#" class="text-decoration-none">*Cómo tu Rutina Diaria Afecta tu Desempeño Escolar"</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Sección de Destacados -->
<div class="container-es" style="margin-bottom: 5%; padding-left: 5%; padding-right: 5%;">
    <h2 class="text-center mb-5">Artículos Destacados</h2>
    <div class="row">
      <div class="col-md-4" style="margin-bottom: 0% 5%;">
        <div class="card mb-4" style="margin-bottom: 0% 5%;">
          <img src="IMAGES/efec3.jpg" class="card-img-top" alt="Destacado 1">
          <div class="card-body">
            <h3 class="card-title">El Impacto de una Asesoría Académica Efectiva en tu Rendimiento Escolar</h3>
            <p class="card-text">Identifica las características de una asesoría académica de calidad frente a prácticas poco efectivas, y aprende a integrarlas adecuadamente en tu plan de estudio.</p>
            <a href="#" class="btn btn-dark">Leer más</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="IMAGES/efec4.png" class="card-img-top" alt="Destacado 2">
          <div class="card-body">
            <h3 class="card-title">¿Por qué las asesorías académicas son clave para tu éxito escolar?</h3>
            <p class="card-text">Conoce la importancia de las asesorías académicas en tu formación y cómo contribuyen al desarrollo de habilidades, la resolución de dudas y la mejora continua de tu rendimiento escolar.</p>
            <a href="#" class="btn btn-dark">Leer más</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="IMAGES/planed.jpg" class="card-img-top" alt="Destacado 3">
          <div class="card-body">
            <h3 class="card-title">Planifica tus Asesorías Académicas Semanales</h3>
            <p class="card-text">Aprende a planificar tus sesiones de asesoría durante la semana para mantener un ritmo de estudio constante y organizado.</p>
            <a href="#" class="btn btn-dark">Leer más</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Sección de Testimonios -->
<div class="container-es bg-light py-5" style="margin-bottom: 5%; padding-left: 5%; padding-right: 5%;">
    <h2 class="text-center mb-5">Comentarios</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="IMAGES/user1.avif" class="rounded-circle mb-3" alt="Usuario 1" width="100">
            <h4 class="card-title">Usuario 1</h4>
            <p class="card-text">"Los consejos de mi asesor académico han transformado mi forma de estudiar. Me siento más organizado, motivado y seguro en mis materias."</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="IMAGES/user2.jpg" class="rounded-circle mb-3" alt="Usuario 2" width="100">
            <h4 class="card-title">Usuario 2</h4>
            <p class="card-text">"Las asesorías son claras y útiles. ¡Totalmente recomendadas!"</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="IMAGES/user3.avif" class="rounded-circle mb-3" alt="Usuario 3" width="100">
            <h4 class="card-title">Usuario 3</h4>
            <p class="card-text">"Los artículos son muy informativos. Me encanta el seguimeinto de las asesorías."</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Sección de Recetas Destacadas -->
<div class="container-es" style="margin-bottom: 5%; padding-left: 5%; padding-right: 5%;">
    <h2 class="text-center mb-5">Articulos Destacados</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-4">
          <img src="IMAGES/estraca.webp" class="card-img-top" alt="Receta 1">
          <div class="card-body">
            <h3 class="card-title">Estrategia de estudio</h3>
            <p class="card-text">Una estrategia fácil y organizada para mantenerte concentrado.</p>
            <a href="#" class="btn btn-dark">Ver estrategia</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card mb-4">
          <img src="IMAGES/a1.png" class="card-img-top" alt="Receta 2">
          <div class="card-body">
            <h3 class="card-title">Plan académico</h3>
            <p class="card-text">Un plan para continuar tu trayectoria académica.</p>
            <a href="#" class="btn btn-dark">Ver plan</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Sección de Videos -->
<div class="container-es bg-light py-5" style="margin-bottom: 5%; padding-left: 5%; padding-right: 5%;">
    <h2 class="text-center mb-5">Videos de Asesorías</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="ratio ratio-16x9">
            <iframe src="https://www.youtube.com/embed/dAeV4kSdtlI" allowfullscreen></iframe>
          </div>
          <div class="card-body">
            <h3 class="card-title">Consejos para una buen rendimiento</h3>
            <p class="card-text">Aprende cómo mejorar tus notas con estos sencillos consejos.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="ratio ratio-16x9">
            <iframe src="https://www.youtube.com/embed/QHlI_wf8zg4" allowfullscreen></iframe>
          </div>
          <div class="card-body">
            <h3 class="card-title">Guía de Sesión de Tutoría</h3>
            <p class="card-text">Protocolo de Acompañamiento Estudiantil</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Sección de Actualizaciones Académicas -->
<div class="container-es" style="margin-bottom: 5%; padding-left: 5%; padding-right: 5%;">
    <h2 class="text-center mb-5">Actualizaciones Académicas</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="IMAGES/kakis.jpg" class="card-img-top" alt="Actualización 1">
          <div class="card-body">
            <h3 class="card-title">Nuevos estudios sobre metodologías de aprendizaje</h3>
            <p class="card-text">Descubre los últimos hallazgos en técnicas de estudio efectivas.</p>
            <a href="#" class="btn btn-dark">Leer más</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="IMAGES/tecg.webp" class="card-img-top" alt="Actualización 2">
          <div class="card-body">
            <h3 class="card-title">Estrategias para el Éxito Académico</h3>
            <p class="card-text">Cómo optimizar tu rendimiento estudiantil y alcanzar tus metas.</p>
            <a href="#" class="btn btn-dark">Leer más</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="IMAGES/herre.jpg" class="card-img-top" alt="Actualización 3">
          <div class="card-body">
            <h3 class="card-title">Herramientas Digitales para Estudiantes</h3>
            <p class="card-text">Descubre qué recursos tecnológicos te ayudan a potenciar tu aprendizaje.</p>
            <a href="#" class="btn btn-dark">Leer más</a>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Sección de Suscripción -->
    <div class="container-es py-5 text-center">
        <h2 class="mb-4">¡No te pierdas nuestras novedades académicas!</h2>
        <p class="lead mb-4">Suscríbete a nuestro boletín y recibe recursos de estudio, consejos académicos y contenido exclusivo.</p>
        <form class="d-flex justify-content-center">
        <input type="email" class="form-control w-50 me-2" placeholder="Ingresa tu correo" required>
        <button type="submit" class="btn btn-dark">Suscribirse</button>
        </form>
    </div>

    </div>
    
<footer class="py-5"
  style="padding: 10%; background-color: black; color: white; font-weight: bolder; margin-top: 60px;">
  <div class="row">
    <div class="col-2">
      <h5>Navegación</h5>
      <ul class="nav flex-column" style="color: white;">
        <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-muted"><span
              class="etiqueta">Inicio</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Servicios de Tutoría</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Recursos Educativos</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span class="etiqueta">Acerca del
              Programa</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Contacto Académico</span></a></li>
      </ul>
    </div>

    <div class="col-2">
      <h5>Servicios</h5>
      <ul class="nav flex-column" style="color: white;">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Programar Tutoría</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Monitoreo de Progreso</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Evaluaciones</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span class="etiqueta">Asesores</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span class="etiqueta">Agenda Académica</span></a></li>
      </ul>
    </div>

    <div class="col-2">
      <h5>Plataforma</h5>
      <ul class="nav flex-column" style="color: white;">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Área Estudiantil</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Área Docente</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Acceso al Sistema</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Manual de Usuario</span></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><span
              class="etiqueta">Asistencia Técnica</span></a></li>
      </ul>
    </div>

    <div class="col-4 offset-1">
      <form>
        <h5>Mantente informado sobre nuestros programas</h5>
        <p>Recibe información sobre convocatorias, talleres, eventos académicos y actualizaciones del sistema de tutorías.</p>
        <div class="d-flex w-100 gap-2">
          <label for="newsletter1" class="visually-hidden">Correo electrónico</label>
          <input id="newsletter1" type="text" class="form-control" placeholder="correo@teccelaya.mx">
          <button class="btn btn-primary" type="button">Suscribirse</button>
        </div>
      </form>
    </div>
  </div>

  <div class="d-flex justify-content-between py-4 my-4 border-top">
    <p>TecNM Campus Celaya © 2025 - Sistema de Tutorías Académicas. Todos los derechos reservados.</p>
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

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</html>
