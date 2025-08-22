<?php
  require_once(__DIR__.'/admin/models/curso.php');
  require_once(__DIR__.'/admin/models/empleado.php');
  $web= new Curso();
  $web2= new Empleado();
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
    Materia a inscribir (Vea a acciones a finalizar).
  </div>
<?php endif; ?>

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
  <link href="CSS/curso.css" rel="stylesheet" type="text/css">
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
      

    <section class="courses-hero text-center text-white d-flex align-items-center justify-content-center" style="
      background: url('IMAGES/class.webp') center/cover no-repeat; 
      height: 500px;
      position: relative; margin-bottom: 5%;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
    <div class="container position-relative">
      <h1 class="display-4 fw-bold">Modulo de Materias</h1>
      <p class="lead">Incribete a tu materia con tu profesor correspondiente.</p>
      <a href="#cursos-destacados" class="btn btn-primary btn-lg">Ver Materias Cargadas en la plataforma</a>
    </div>
    </section>

    <section id="cursos-destacados" class="container-es py-5">
      <h2 class="text-center mb-5">Modulos para Incribirse (incribete en tus materias correspondintes)</h2>
      <div class="row">


      <section style="margin-bottom:2rem;">
        <div class="d-flex justify-content-center mt-4">
          <form action="cursos.php" method="GET" class="d-flex align-items-center gap-3 p-3 bg-light rounded shadow-sm" style="max-width: 500px;">
              <select name="id" class="form-select" style="min-width: 200px;">
              <option disabled selected>Filtra por Docente</option>
              <?php foreach($marcas as $marca): ?>
                  <option value='<?php echo $marca['empleado_id']; ?>'><?php echo ($marca['nombre'].' '.$marca['primer_apellido'].' '.$marca['segundo_apellido']); ?></option>
              <?php endforeach; ?>
                  <option value=''><?php echo ("Todos"); ?></option>
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
      </section>


<?php if($productos!=null): ?>
  <?php foreach($productos as $producto): ?>
        <!-- Curso 1 -->
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            <img src="<?php echo 'uploads/'.$producto['fotografia']; ?>" class="card-img-top" alt="Curso de Nutrición Básica">
            <div style="align-items:center !important; justify-content:center !important; place-items:center !important;" class="card-body">
              <h4 style="align-items:center !important; justify-content:center !important; place-items:center !important;" class="card-title"><?php echo $producto['curso']; ?></h4>
              <p class="card-text"><?php echo $producto['descripcion']; ?></p>
              <a href="agregar_curso.php?id=<?php echo $producto['id_curso']; ?>&nombre=<?php echo urlencode($producto['curso']); ?>&precio=<?php echo $producto['precio']; ?>&imagen=<?php echo $producto['fotografia']; ?>" class="btn btn-primary">
                  Unirse al Aula
                </a>
              <section style="margin-top:1rem; text-align:center;">
                  <span class="badge bg-info p-2 fs-6">Creditos(Horas): <?php echo $producto['duracion_horas']; ?></span>
                  <span class="badge bg-danger p-2 fs-6">Inscritos: <?php echo $producto['inscritos']; ?></span>
              </section>
            </div>
          </div>
        </div>
<?php endforeach; ?>
  <?php endif; ?>
      </div>
    </section>


<section class="testimonios-section py-5" style="background-color: #223f2862;">
  <div class="container-es">
    <h2 class="text-center mb-5">¿Cómo Inscribirte a una Materia?</h2>
    <div class="row">
      <!-- Paso 1 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm text-center">
          <div class="card-body">
            <img src="IMAGES/st1.png" class="mb-3" alt="Filtrar por Profesor" width="80">
            <h4 class="card-title">1. Filtra por Profesor</h4>
            <p class="card-text">Usa la barra de búsqueda o el filtro para encontrar al profesor o grupo que te interesa.</p>
          </div>
        </div>
      </div>
      <!-- Paso 2 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm text-center">
          <div class="card-body">
            <img src="IMAGES/mah.png" class="mb-3" alt="Seleccionar Materia" width="80">
            <h4 class="card-title">2. Elige la Materia</h4>
            <p class="card-text">Visualiza la lista de materias disponibles y revisa la información antes de continuar.</p>
          </div>
        </div>
      </div>
      <!-- Paso 3 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm text-center">
          <div class="card-body">
            <img src="IMAGES/st2.png" class="mb-3" alt="Inscribirse" width="80">
            <h4 class="card-title">3. Haz Clic en “Inscribirme”</h4>
            <p class="card-text">Selecciona el botón para comenzar el proceso de inscripción en la materia elegida.</p>
          </div>
        </div>
      </div>
      <!-- Paso 4 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm text-center">
          <div class="card-body">
            <img src="IMAGES/acs.png" class="mb-3" alt="Clave de Acceso" width="80">
            <h4 class="card-title">4. Ingresa la Clave</h4>
            <p class="card-text">Escribe la clave proporcionada por el profesor para confirmar tu inscripción.</p>
          </div>
        </div>
      </div>
      <!-- Paso 5 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm text-center">
          <div class="card-body">
            <img src="IMAGES/recu.png" class="mb-3" alt="Recursos" width="80">
            <h4 class="card-title">5. Accede a los Recursos</h4>
            <p class="card-text">Una vez inscrito, podrás ver materiales, tareas y enlaces del curso en tu panel.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Botón final -->
    <div class="text-center mt-4">
      <a href="#" class="btn btn-success btn-lg">
        Ir al Sistema de Inscripción
      </a>
    </div>
  </div>
</section>


<!-- Qué Encontrarás Dentro de Tus Clases y Cómo Acceder -->
<section class="clases-recursos-section py-5" style="background-image: url('../IMAGES/wrper.avif'); background-repeat: repeat; background-size: cover;">
  <div class="container-es">
    <h2 style="font-weight:bold !important;" class="text-center mb-5">¿Qué Encontrarás Dentro de Tus Clases y Recursos?</h2>
    <div class="row">
      <!-- Recurso 1 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm text-center p-4">
          <div class="card-body">
            <i class="fas fa-video fa-3x mb-3" style="color: rgb(34, 53, 17);"></i>
            <h4 class="card-title">Clases en Video</h4>
            <p class="card-text">Accede a sesiones grabadas y en vivo para aprender a tu propio ritmo y repasar cuando quieras.</p>
          </div>
        </div>
      </div>
      <!-- Recurso 2 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm text-center p-4">
          <div class="card-body">
            <i class="fas fa-file-alt fa-3x mb-3" style="color: rgb(34, 53, 17);"></i>
            <h4 class="card-title">Material de Estudio</h4>
            <p class="card-text">Documentos, presentaciones y guías prácticas que complementan el aprendizaje en cada materia.</p>
          </div>
        </div>
      </div>
      <!-- Recurso 3 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm text-center p-4">
          <div class="card-body">
            <i class="fas fa-comments fa-3x mb-3" style="color: rgb(34, 53, 17);"></i>
            <h4 class="card-title">Foros y Chat</h4>
            <p class="card-text">Interactúa con profesores y compañeros para resolver dudas y compartir experiencias.</p>
          </div>
        </div>
      </div>
      <!-- Recurso 4 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm text-center p-4">
          <div class="card-body">
            <i class="fas fa-tasks fa-3x mb-3" style="color: rgb(34, 53, 17);"></i>
            <h4 class="card-title">Actividades y Evaluaciones</h4>
            <p class="card-text">Realiza ejercicios y exámenes para medir tu progreso y reforzar los conocimientos adquiridos.</p>
          </div>
        </div>
      </div>
      <!-- Recurso 5 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm text-center p-4">
          <div class="card-body">
            <i class="fas fa-user-lock fa-3x mb-3" style="color: rgb(34, 53, 17);"></i>
            <h4 class="card-title">Acceso Seguro</h4>
            <p class="card-text">Recuerda que para ingresar a las clases y recursos debes iniciar sesión con tu usuario y clave.</p>
          </div>
        </div>
      </div>
      <!-- Recurso 6 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm text-center p-4">
          <div class="card-body">
            <i class="fas fa-mobile-alt fa-3x mb-3" style="color: rgb(34, 53, 17);"></i>
            <h4 class="card-title">Acceso Multidispositivo</h4>
            <p class="card-text">Consulta tus clases y recursos desde cualquier dispositivo: computadora, tablet o smartphone.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Coordinadores y Departamentos de Apoyo -->
<section class="testimonios-section py-5" style="background-color: #45614a79;">
  <div class="container-es">
    <h2 class="text-center mb-5">Coordinadores y Departamentos de Apoyo</h2>
    <div class="row">
      <!-- Coordinador 1 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="IMAGES/dir.webp" class="card-img-top" alt="Coordinación Académica">
          <div class="card-body text-center">
            <h4 class="card-title">Coordinación Académica</h4>
            <p class="card-text">Atiende dudas sobre planes de estudio, inscripción de materias y seguimiento académico.</p>
            <a href="#" class="btn btn-outline-primary">Contactar</a>
          </div>
        </div>
      </div>
      <!-- Coordinador 2 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="IMAGES/pjk.jpg" class="card-img-top" alt="Servicio de Mentoría">
          <div class="card-body text-center">
            <h4 class="card-title">Servicio de Mentoría</h4>
            <p class="card-text">Apoyo personalizado para orientar tu proceso de aprendizaje y resolver dudas específicas.</p>
            <a href="#" class="btn btn-outline-primary">Contactar</a>
          </div>
        </div>
      </div>
      <!-- Coordinador 3 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="IMAGES/sop.webp" class="card-img-top" alt="Soporte Técnico">
          <div class="card-body text-center">
            <h4 class="card-title">Soporte Técnico</h4>
            <p class="card-text">Asistencia para problemas técnicos con la plataforma, acceso a clases y recursos digitales.</p>
            <a href="#" class="btn btn-outline-primary">Contactar</a>
          </div>
        </div>
      </div>
    </div>
    <p class="text-center mt-4" style="color:rgb(2, 39, 5);">
      Para una atención más rápida, puedes comunicarte directamente con el área correspondiente desde la plataforma.
    </p>
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


<a href="./admin/carrito.php" class="btn btn-primary btn-lg shadow rounded-circle position-fixed" style="bottom: 20px; right: 20px; z-index: 1000;">
  🚀
</a>
</html>