<?php
  require_once(__DIR__.'/admin/models/plan.php');
  require_once(__DIR__.'/admin/models/empleado.php');
  $web= new Plan();
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
    Mentoría a inscribir (Vea a acciones a finalizar).
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
  <link href="CSS/plan.css" rel="stylesheet" type="text/css">
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
      

        <section class="plans-hero text-center text-white d-flex align-items-center justify-content-center" style="
            background: url('IMAGES/estu.webp') center/cover no-repeat; 
            height: 400px;
            position: relative; margin-bottom: 5%;">
            <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
            <div class="container position-relative">
            <h1 class="display-4 fw-bold">Mentorias Estudiantiles</h1>
            <p class="lead">Descubre las mentorias impartidas por otros estudiantes y por personal dentro del Tec de Celaya </p>
            <a href="#catalogo" class="btn btn-primary btn-lg">Explorar Mentorias</a>
            </div>
        </section>

            <!-- Catalogo de Planes Nutricionales -->
      <section id="catalogo" class="container-es py-5">
        <h2 class="text-center mb-5">Mentorias disponibles para estudiantes</h2>
        <div class="row">


      <section style="margin-bottom:2rem;">
        <div class="d-flex justify-content-center mt-4">
          <form action="planes.php" method="GET" class="d-flex align-items-center gap-3 p-3 bg-light rounded shadow-sm" style="max-width: 500px;">
              <select name="id" class="form-select" style="min-width: 200px;">
              <option disabled selected>Filtra por Mentores</option>
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
          <!-- Plan 1 -->
          <div class="col-md-4 mb-4">
            <div class="card h-100">
              <img src="<?php echo 'uploads/'.$producto['fotografia']; ?>" class="card-img-top" alt="Plan Pérdida de Peso">
              <div style="text-align:center;" class="card-body">
                <h4 class="card-title"><?php echo $producto['nombre_plan']; ?></h4>
                <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                <a style="margin:5%;" href="agregar_plan.php?id=<?php echo $producto['id_plan']; ?>&nombre=<?php echo urlencode($producto['nombre_plan']); ?>&precio=<?php echo $producto['precio']; ?>&imagen=<?php echo $producto['fotografia']; ?>" class="btn btn-primary">
                  Inscribirse
                </a>
                <span class="badge bg-success p-2 fs-6">Inversion en Material $<?php echo $producto['precio']; ?></span>
                <section style="margin-top:1rem; text-align:center;">
                  <span class="badge bg-info p-2 fs-6">Duracion(Dias): <?php echo $producto['duracion_dias']; ?></span>
                  <span class="badge bg-danger p-2 fs-6">Personas: <?php echo $producto['usuarios_asignados']; ?></span>
                </section>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </section>

 <!-- Sección de Beneficios de las Mentorías con Tabs -->
<section style="margin-top:5%;" class="container-es py-5 bg-light">
  <h2 class="text-center mb-5">Beneficios de tomar Mentorías</h2>
  <div class="row">
    <div class="col-md-8 mx-auto">
      <!-- Pestañas -->
      <ul class="nav nav-tabs justify-content-center mb-4" id="mentoriasTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="estudiantes-tab" data-bs-toggle="tab" data-bs-target="#estudiantes" type="button" role="tab" aria-controls="estudiantes" aria-selected="true">
            Mentorías entre Estudiantes
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="docentes-tab" data-bs-toggle="tab" data-bs-target="#docentes" type="button" role="tab" aria-controls="docentes" aria-selected="false">
            Mentorías por Docentes
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="grupales-tab" data-bs-toggle="tab" data-bs-target="#grupales" type="button" role="tab" aria-controls="grupales" aria-selected="false">
            Mentorías Grupales
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="virtual-tab" data-bs-toggle="tab" data-bs-target="#virtual" type="button" role="tab" aria-controls="virtual" aria-selected="false">
            Modalidad Virtual
          </button>
        </li>
      </ul>

      <!-- Contenido de pestañas -->
      <div class="tab-content" id="mentoriasTabContent">
        <!-- Estudiantes -->
        <div class="tab-pane fade show active" id="estudiantes" role="tabpanel" aria-labelledby="estudiantes-tab">
          <div class="row">
            <div class="col-md-6">
              <img src="IMAGES/mento.webp" class="img-fluid rounded" alt="Mentoría entre estudiantes">
            </div>
            <div class="col-md-6">
              <h3>Mentoría entre Estudiantes</h3>
              <p>Fomenta el aprendizaje colaborativo entre pares. Ideal para quienes buscan:</p>
              <ul>
                <li>Refuerzo en temas específicos.</li>
                <li>Apoyo entre compañeros de semestre o carrera.</li>
                <li>Resolución de dudas en un ambiente amigable.</li>
                <li>Flexibilidad en horarios y modalidad.</li>
              </ul>
              <a href="#" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>

        <!-- Docentes -->
        <div class="tab-pane fade" id="docentes" role="tabpanel" aria-labelledby="docentes-tab">
          <div class="row">
            <div class="col-md-6">
              <img src="IMAGES/mentoa.webp" class="img-fluid rounded" alt="Mentoría por docentes">
            </div>
            <div class="col-md-6">
              <h3>Mentoría Académica con Docentes</h3>
              <p>Asesorías especializadas impartidas por profesores y expertos. Incluyen:</p>
              <ul>
                <li>Revisión personalizada de tus avances.</li>
                <li>Explicaciones profundas sobre temas complejos.</li>
                <li>Orientación para trabajos, proyectos y prácticas.</li>
                <li>Mejor preparación para evaluaciones.</li>
              </ul>
              <a href="#" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>

        <!-- Grupales -->
        <div class="tab-pane fade" id="grupales" role="tabpanel" aria-labelledby="grupales-tab">
          <div class="row">
            <div class="col-md-6">
              <img src="IMAGES/grup.webp" class="img-fluid rounded" alt="Mentorías grupales">
            </div>
            <div class="col-md-6">
              <h3>Mentorías Grupales</h3>
              <p>Sesiones compartidas con otros estudiantes para aprender juntos. Ofrecen:</p>
              <ul>
                <li>Dinámicas de participación activa.</li>
                <li>Intercambio de ideas y soluciones.</li>
                <li>Trabajo colaborativo por áreas temáticas.</li>
                <li>Desarrollo de habilidades sociales y académicas.</li>
              </ul>
              <a href="#" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>

        <!-- Virtual -->
        <div class="tab-pane fade" id="virtual" role="tabpanel" aria-labelledby="virtual-tab">
          <div class="row">
            <div class="col-md-6">
              <img src="IMAGES/seko.png" class="img-fluid rounded" alt="Mentoría virtual">
            </div>
            <div class="col-md-6">
              <h3>Modalidad Virtual</h3>
              <p>Accede a mentorías desde cualquier lugar. Perfecto para:</p>
              <ul>
                <li>Estudiantes con horarios ajustados.</li>
                <li>Asesorías fuera del horario escolar.</li>
                <li>Conexión mediante videollamadas o plataformas educativas.</li>
                <li>Acceso a grabaciones y materiales digitales.</li>
              </ul>
              <a href="#" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin de contenido de pestañas -->
    </div>
  </div>
</section>


  <!-- Galería de Experiencias de Estudiantes -->
<section style="margin-top:5%;" class="container-es py-5">
  <h2 class="text-center mb-5">Alumnos que han tomado Mentorias</h2>
  <div class="row">
    <!-- Estudiante 1 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/ana.jpg" class="card-img-top" alt="Estudiante 1">
        <div class="card-body text-center">
          <h4 class="card-title">Ana López</h4>
          <p class="card-text">"Gracias a las asesorías en matemáticas, pasé el semestre con excelentes calificaciones."</p>
          <div class="d-flex justify-content-center">
            <span class="badge bg-success me-2">Matemáticas</span>
            <span class="badge bg-info">Asesoría</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Estudiante 2 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/bb.jpg" class="card-img-top" alt="Estudiante 2">
        <div class="card-body text-center">
          <h4 class="card-title">Carlos Martínez</h4>
          <p class="card-text">"Con el apoyo del mentor académico, terminé mi proyecto de titulación sin contratiempos."</p>
          <div class="d-flex justify-content-center">
            <span class="badge bg-warning me-2">Proyecto</span>
            <span class="badge bg-info">Titulación</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Estudiante 3 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/otra.jpg" class="card-img-top" alt="Estudiante 3">
        <div class="card-body text-center">
          <h4 class="card-title">María González</h4>
          <p class="card-text">"Las sesiones de orientación vocacional me ayudaron a decidir mi enfoque profesional."</p>
          <div class="d-flex justify-content-center">
            <span class="badge bg-primary me-2">Orientación</span>
            <span class="badge bg-info">Carrera</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Estudiante 4 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/kp.jpg" class="card-img-top" alt="Estudiante 4">
        <div class="card-body text-center">
          <h4 class="card-title">Juan Pérez</h4>
          <p class="card-text">"Las asesorías en programación me prepararon mejor para las entrevistas técnicas."</p>
          <div class="d-flex justify-content-center">
            <span class="badge bg-secondary me-2">Programación</span>
            <span class="badge bg-info">Práctica</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Estudiante 5 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/sog.jpg" class="card-img-top" alt="Estudiante 5">
        <div class="card-body text-center">
          <h4 class="card-title">Laura Ramírez</h4>
          <p class="card-text">"Gracias a los recursos de la plataforma, logré organizar mejor mi tiempo de estudio."</p>
          <div class="d-flex justify-content-center">
            <span class="badge bg-danger me-2">Gestión</span>
            <span class="badge bg-info">Productividad</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Estudiante 6 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/aa.jpg" class="card-img-top" alt="Estudiante 6">
        <div class="card-body text-center">
          <h4 class="card-title">Sofía Díaz</h4>
          <p class="card-text">"Las asesorías en inglés académico me ayudaron a presentar mi primera ponencia."</p>
          <div class="d-flex justify-content-center">
            <span class="badge bg-success me-2">Inglés</span>
            <span class="badge bg-info">Presentación</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Recursos Académicos y Servicios Complementarios -->
<section style="margin-top:5%;" class="container-es py-5 bg-light">
  <h2 class="text-center mb-5">Recursos Académicos y Servicios Complementarios</h2>
  <div class="row">
    <!-- Recurso 1: Biblioteca Digital -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/pk.jpg" class="card-img-top" alt="Biblioteca Digital">
        <div class="card-body text-center">
          <h4 class="card-title">Biblioteca Digital</h4>
          <p class="card-text">Accede a miles de libros, artículos y recursos digitales para complementar tus estudios.</p>
          <a href="#" class="btn btn-primary">Explorar Biblioteca</a>
        </div>
      </div>
    </div>
    
    <!-- Recurso 2: Cursos en Línea -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/w1.webp" class="card-img-top" alt="Cursos en Línea">
        <div class="card-body text-center">
          <h4 class="card-title">Cursos Complementarios</h4>
          <p class="card-text">Amplía tu formación con cursos sobre habilidades blandas, liderazgo, tecnología y más.</p>
          <a href="#" class="btn btn-primary">Ver Cursos</a>
        </div>
      </div>
    </div>

    <!-- Recurso 3: Asesorías Académicas -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/mena.jpg" class="card-img-top" alt="Asesorías Académicas">
        <div class="card-body text-center">
          <h4 class="card-title">Asesorías Académicas</h4>
          <p class="card-text">Solicita asesorías personalizadas con expertos en distintas áreas del conocimiento.</p>
          <a href="#" class="btn btn-primary">Agendar Asesoría</a>
        </div>
      </div>
    </div>

    <!-- Recurso 4: Herramientas Tecnológicas -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/tecn.webp" class="card-img-top" alt="Herramientas Tecnológicas">
        <div class="card-body text-center">
          <h4 class="card-title">Herramientas Tecnológicas</h4>
          <p class="card-text">Accede a software educativo, simuladores y plataformas digitales para mejorar tu aprendizaje.</p>
          <a href="#" class="btn btn-primary">Ir a Herramientas</a>
        </div>
      </div>
    </div>

    <!-- Recurso 5: Talleres y Webinars -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/web.webp" class="card-img-top" alt="Talleres y Webinars">
        <div class="card-body text-center">
          <h4 class="card-title">Talleres y Webinars</h4>
          <p class="card-text">Participa en sesiones en vivo sobre temas académicos, tecnológicos y de desarrollo personal.</p>
          <a href="#" class="btn btn-primary">Ver Talleres</a>
        </div>
      </div>
    </div>

    <!-- Recurso 6: Comunidad Estudiantil -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="IMAGES/comun.webp" class="card-img-top" alt="Comunidad Estudiantil">
        <div class="card-body text-center">
          <h4 class="card-title">Comunidad Estudiantil</h4>
          <p class="card-text">Únete a foros, grupos de estudio y actividades colaborativas dentro de la plataforma.</p>
          <a href="#" class="btn btn-primary">Unirse Ahora</a>
        </div>
      </div>
    </div>
  </div>
</section>


<section style="margin-top:5%;" class="container-es py-5">
  <h2 class="text-center mb-5">Mentorías y Recursos Educativos</h2>
  <!-- Filtros por Categoría -->
  <div class="text-center mb-4">
    <button class="btn btn-outline-primary me-2 active" data-filter="all">Todas</button>
    <button class="btn btn-outline-primary me-2" data-filter="mentorias">Mentorías</button>
    <button class="btn btn-outline-primary me-2" data-filter="tecnicas">Técnicas de Estudio</button>
    <button class="btn btn-outline-primary me-2" data-filter="tutorias">Tutorías</button>
    <button class="btn btn-outline-primary" data-filter="herramientas">Herramientas</button>
  </div>

  <!-- Galería -->
  <div class="row" id="recursos-gallery">
    <!-- Tarjeta 1 -->
    <div class="col-md-4 mb-4 recurso-item" data-category="mentorias">
      <div class="card h-100">
        <img src="IMAGES/y1.jpg" class="card-img-top" alt="Mentoría 1">
        <div class="card-body text-center">
          <h4 class="card-title">Mentoría Personalizada</h4>
          <p class="card-text">Conecta con un docente que te acompañará en tu proceso académico y resolverá tus dudas.</p>
          <a href="#" class="btn btn-primary">Solicitar Mentoría</a>
        </div>
      </div>
    </div>

    <!-- Tarjeta 2 -->
    <div class="col-md-4 mb-4 recurso-item" data-category="tecnicas">
      <div class="card h-100">
        <img src="IMAGES/pom.jpg" class="card-img-top" alt="Técnica de Estudio">
        <div class="card-body text-center">
          <h4 class="card-title">Técnica Pomodoro</h4>
          <p class="card-text">Mejora tu concentración dividiendo el estudio en intervalos. Ideal para evitar la fatiga mental.</p>
          <a href="#" class="btn btn-primary">Ver Técnica</a>
        </div>
      </div>
    </div>

    <!-- Tarjeta 3 -->
    <div class="col-md-4 mb-4 recurso-item" data-category="tutorias">
      <div class="card h-100">
        <img src="IMAGES/mat.jpg" class="card-img-top" alt="Tutoría Académica">
        <div class="card-body text-center">
          <h4 class="card-title">Tutoría de Matemáticas</h4>
          <p class="card-text">Sesión especializada con un tutor que te ayudará a dominar temas difíciles.</p>
          <a href="#" class="btn btn-primary">Agendar</a>
        </div>
      </div>
    </div>

    <!-- Tarjeta 4 -->
    <div class="col-md-4 mb-4 recurso-item" data-category="herramientas">
      <div class="card h-100">
        <img src="IMAGES/hora.jpg" class="card-img-top" alt="Herramienta Educativa">
        <div class="card-body text-center">
          <h4 class="card-title">Organizador de Tareas</h4>
          <p class="card-text">Planifica tus pendientes y entrega tus proyectos a tiempo. ¡Optimiza tu rendimiento!</p>
          <a href="#" class="btn btn-primary">Usar Herramienta</a>
        </div>
      </div>
    </div>

    <!-- Tarjeta 5 -->
    <div class="col-md-4 mb-4 recurso-item" data-category="mentorias">
      <div class="card h-100">
        <img src="IMAGES/mates.webp" class="card-img-top" alt="Mentoría 2">
        <div class="card-body text-center">
          <h4 class="card-title">Asesoría Académica</h4>
          <p class="card-text">Recibe orientación sobre cómo mejorar tu rendimiento en cada materia con ayuda de mentores expertos.</p>
          <a href="#" class="btn btn-primary">Conocer Más</a>
        </div>
      </div>
    </div>

    <!-- Tarjeta 6 -->
    <div class="col-md-4 mb-4 recurso-item" data-category="tecnicas">
      <div class="card h-100">
        <img src="IMAGES/mapa.png" class="card-img-top" alt="Técnica de Estudio 2">
        <div class="card-body text-center">
          <h4 class="card-title">Mapas Mentales</h4>
          <p class="card-text">Organiza ideas visualmente para comprender mejor los temas complejos y mejorar tu memoria.</p>
          <a href="#" class="btn btn-primary">Aprender a Hacerlo</a>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Sección de Preguntas Frecuentes (FAQ) -->
<section style="margin-top:5%;" class="container-es py-5 bg-light">
  <h2 class="text-center mb-5">Preguntas Frecuentes</h2>
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="accordion" id="faqAccordion">
        <!-- Pregunta 1 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              ¿Cómo puedo acceder a una mentoría académica?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Solo necesitas registrarte en la plataforma con tu correo institucional, ingresar al apartado de "Mentorías" y seleccionar el tema o área en la que necesitas ayuda. Ahí podrás agendar una sesión con un mentor disponible.
            </div>
          </div>
        </div>
        <!-- Pregunta 2 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              ¿Las mentorías tienen algún costo?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              No, todas las mentorías son completamente gratuitas para estudiantes activos. El objetivo es brindar apoyo académico accesible y de calidad.
            </div>
          </div>
        </div>
        <!-- Pregunta 3 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              ¿Quiénes son los mentores?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Nuestros mentores son estudiantes avanzados, egresados y profesores voluntarios con experiencia en distintas áreas académicas, capacitados para brindar asesoría clara y personalizada.
            </div>
          </div>
        </div>
        <!-- Pregunta 4 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              ¿Qué tipo de temas o materias se pueden consultar?
            </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Puedes solicitar mentoría en materias como matemáticas, programación, física, redacción académica, inglés, proyectos finales, entre otros. Cada semana se actualizan los temas disponibles.
            </div>
          </div>
        </div>
        <!-- Pregunta 5 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              ¿Puedo reprogramar o cancelar una sesión ya agendada?
            </button>
          </h2>
          <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Sí, puedes reprogramar o cancelar tu sesión desde tu panel de usuario con al menos 4 horas de anticipación. Así otros estudiantes pueden aprovechar ese espacio.
            </div>
          </div>
        </div>
        <!-- Pregunta 6 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingSix">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
              ¿Puedo ser mentor o colaborar en la plataforma?
            </button>
          </h2>
          <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              ¡Claro! Si eres estudiante destacado, egresado o docente y deseas apoyar a otros, puedes registrarte como mentor desde la sección “Conviértete en mentor”. El equipo revisará tu perfil y te contactará.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Sección de Contacto con Mentores Académicos -->
<section style="margin-top:5%;" class="container-es py-5">
  <h2 class="text-center mb-5">Contacto con Mentores Académicos</h2>
  <div class="row">
    <!-- Formulario de Contacto -->
    <div class="col-md-6">
      <form>
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre Completo</label>
          <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre completo" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Correo Institucional</label>
          <input type="email" class="form-control" id="email" placeholder="Ejemplo: alumno@itcelaya.edu.mx" required>
        </div>
        <div class="mb-3">
          <label for="carrera" class="form-label">Carrera o Especialidad</label>
          <input type="text" class="form-control" id="carrera" placeholder="Ingresa tu carrera (Ej. ISC, IGE...)" required>
        </div>
        <div class="mb-3">
          <label for="mensaje" class="form-label">Mensaje o Consulta</label>
          <textarea class="form-control" id="mensaje" rows="5" placeholder="Escribe tu duda, inquietud o solicitud de asesoría" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Enviar a Mentoría</button>
      </form>
    </div>

    <!-- Información de la División de Mentores -->
    <div class="col-md-6">
      <div class="card h-100 shadow-lg border-0">
        <div class="card-body">
          <h4 class="card-title mb-4">División de Mentorías Académicas</h4>
          <p class="card-text"><strong>Ubicación:</strong> Edificio B, Planta Alta, TecNM Campus Celaya</p>
          <p class="card-text"><strong>Teléfono:</strong> +52 (461) 611 7575 ext. 112</p>
          <p class="card-text"><strong>Correo de contacto:</strong> mentorias@itcelaya.edu.mx</p>
          <p class="card-text"><strong>Horario de atención:</strong> Lunes a Viernes, de 9:00 a.m. a 5:00 p.m.</p>
          
          <h5 class="mt-4">Conecta con nosotros</h5>
          <div class="d-flex mt-3">
            <a href="https://www.facebook.com/TecNMCelaya" target="_blank" class="me-3">
              <img src="IMAGES/facebook.png" alt="Facebook Tec" width="30">
            </a>
            <a href="https://www.instagram.com/tecnm.mx/" target="_blank" class="me-3">
              <img src="IMAGES/instagram.png" alt="Instagram Tec" width="30">
            </a>
            <a href="https://wa.me/5214611234567" target="_blank" class="me-3">
              <img src="IMAGES/whatsapp.png" alt="WhatsApp Tec" width="30">
            </a>
            <a href="mailto:mentorias@itcelaya.edu.mx">
              <img src="IMAGES/email_icon.png" alt="Correo Tec" width="30">
            </a>
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


    <script>
      document.querySelectorAll('.btn-outline-success').forEach(button => {
        button.addEventListener('click', () => {
        
          document.querySelectorAll('.btn-outline-success').forEach(btn => btn.classList.remove('active'));
          button.classList.add('active');
    
          const filter = button.getAttribute('data-filter');
          const recetas = document.querySelectorAll('.receta-item');
    
          recetas.forEach(receta => {
            if (filter === 'all' || receta.getAttribute('data-category') === filter) {
              receta.style.display = 'block';
            } else {
              receta.style.display = 'none';
            }
          });
        });
      });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

<a href="./admin/carrito.php" class="btn btn-primary btn-lg shadow rounded-circle position-fixed" style="bottom: 20px; right: 20px; z-index: 1000;">
  🚀
</a>

</html>