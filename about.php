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
    background: url('IMAGES/about-header.jpg') center/cover no-repeat; 
    height: 350px;
    position: relative; 
    margin-bottom: 5%;">
  <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(34, 53, 17, 0.6);"></div>
  <div class="container position-relative">
    <h1 class="display-4 fw-bold">ConectaTEC: Educación y Asesorías Unificadas</h1>
    <p class="lead">Transformamos la gestión académica en el TecNM Celaya con tecnología a tu alcance.</p>
  </div>
</section>





  <!-- Sección de Historia -->
  <div class="container-es py-5" style="margin-bottom: 3%;">
    <div class="row">
      <div class="col-md-6">
        <h2 class="mb-4">¿Por qué centralizar los recursos?</h2>
        <p class="lead" style="text-align: justify;">
          ConectaTEC nace ante la necesidad de integrar y optimizar los múltiples canales de asesorías académicas, recursos educativos y actividades complementarias que el TecNM campus Celaya ofrece a su comunidad estudiantil.
        </p>
        <p style="text-align: justify;">
          Anteriormente, la información se encontraba dispersa en distintos medios, dificultando el acceso eficiente a apoyos académicos, convocatorias, asesorías y materiales relevantes. Este proyecto propone una solución digital que centraliza toda esa información en una sola plataforma, intuitiva y accesible.
        </p>
      </div>
      <div class="col-md-6">
        <img src="IMAGES/centra.jpg" class="img-fluid rounded" alt="Historia de ConectaTEC">
      </div>
    </div>
  </div>


<!-- Sección de Misión y Visión -->
<div class="container-es bg-light py-5" style="margin-bottom: 3%;">
  <div class="row">
    <div class="col-md-6">
      <h2 class="mb-4">Nuestra Misión</h2>
      <p class="lead">
        Facilitar el acceso, la gestión y el seguimiento de recursos educativos y asesorías académicas mediante una plataforma web centralizada que promueva la equidad, eficiencia y calidad en el acompañamiento estudiantil.
      </p>
    </div>
    <div class="col-md-6">
      <h2 class="mb-4">Nuestra Visión</h2>
      <p class="lead">
        Ser la solución institucional de referencia para la coordinación de recursos académicos y asesorías en el TecNM, fortaleciendo el rendimiento y permanencia escolar a través de la tecnología.
      </p>
    </div>
  </div>
</div>

<!-- Qué centraliza ConectaTEC -->
<div  class="container-es bg-success text-white p-5 rounded" style="margin-bottom: 3%;">
  <h2 class="text-center mb-4">¿Qué centraliza ConectaTEC?</h2>
  <ul class="lead">
    <li style="color:black !important;" >📚 Asesorías académicas por carrera y tutor.</li>
    <li style="color:black !important;">📆 Convocatorias y eventos institucionales.</li>
    <li style="color:black !important;">📂 Repositorio de recursos educativos y guías.</li>
    <li style="color:black !important;">👥 Información de tutores y contactos de apoyo.</li>
    <li style="color:black !important;">📊 Estadísticas de participación y seguimiento.</li>
  </ul>
</div>



    <!-- Sección de Funcionalidades -->
<div class="container-es py-5" style="margin-bottom: 3%;">
  <h2 class="text-center mb-5">Funcionalidades de la Plataforma</h2>

  <div class="row">
    <div class="col-md-4">
      <div class="card mb-4">
        <img src="IMAGES/a2.jpg" class="card-img-top" alt="Consulta personalizada">
        <div class="card-body text-center">
          <h4 class="card-title">Asesorías Académicas</h4>
          <p class="card-text">Reserva asesorías con expertos en diferentes áreas académicas, según tu necesidad y horario disponible.</p>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card mb-4">
        <img src="IMAGES/s3.webp" class="card-img-top" alt="Historial académico">
        <div class="card-body text-center">
          <h4 class="card-title">Historial de Consultas</h4>
          <p class="card-text">Visualiza todas tus asesorías pasadas, observaciones y recomendaciones para un seguimiento eficiente.</p>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card mb-4">
        <img src="IMAGES/s2.webp" class="card-img-top" alt="Gestión de recursos">
        <div class="card-body text-center">
          <h4 class="card-title">Centralización de Recursos</h4>
          <p class="card-text">Accede a materiales, tutoriales y enlaces útiles desde un solo lugar, organizados por temas y materias.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="card mb-4">
        <img src="IMAGES/f1.webp" class="card-img-top" alt="Notificaciones">
        <div class="card-body text-center">
          <h4 class="card-title">Notificaciones y Recordatorios</h4>
          <p class="card-text">Recibe alertas automáticas sobre tus próximas asesorías y recomendaciones importantes del sistema.</p>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card mb-4">
        <img src="IMAGES/men1.jpg" class="card-img-top" alt="Evaluación y retroalimentación">
        <div class="card-body text-center">
          <h4 class="card-title">Evaluación de Mentorias</h4>
          <p class="card-text">Califica y comenta cada asesoría para mejorar la calidad del servicio y el seguimiento académico.</p>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card mb-4">
        <img src="IMAGES/panel.jpg" class="card-img-top" alt="Panel administrativo">
        <div class="card-body text-center">
          <h4 class="card-title">Panel Administrativo</h4>
          <p class="card-text">Permite a los coordinadores gestionar agendas, perfiles de asesores y estadísticas en tiempo real.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
  <div class="col-md-4">
    <div class="card mb-4">
      <img src="IMAGES/men.webp" class="card-img-top" alt="Chat en tiempo real">
      <div class="card-body text-center">
        <h4 class="card-title">Mensajes a los docentes y mentores</h4>
        <p class="card-text">Comunícate directamente con asesores o personal de apoyo para resolver dudas rápidas antes o después de una sesión.</p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card mb-4">
      <img src="IMAGES/bus.jpg" class="card-img-top" alt="Buscador inteligente">
      <div class="card-body text-center">
        <h4 class="card-title">Buscador Inteligente</h4>
        <p class="card-text">Encuentra rápidamente asesorías, temas específicos o materiales con un buscador adaptativo y predictivo.</p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card mb-4">
      <img src="IMAGES/perfil.avif" class="card-img-top" alt="Perfil personalizado">
      <div class="card-body text-center">
        <h4 class="card-title">Perfil Personalizado</h4>
        <p class="card-text">Edita tu perfil con intereses académicos, metas educativas y preferencias para una experiencia más adaptada.</p>
      </div>
    </div>
  </div>
</div>


</div>



  <section class="container my-5">
  <h2 class="text-center mb-4">Beneficios para Estudiantes</h2>
  <p class="text-center text-muted mb-5">Descubre cómo nuestra plataforma mejora tu experiencia académica de forma integral.</p>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 text-center p-4">
        <div class="mb-3">
          <i class="bi bi-person-check-fill text-success" style="font-size: 3rem;"></i>
        </div>
        <h5 class="card-title">Asesorías Personalizadas</h5>
        <p class="card-text">Recibe atención uno a uno con asesores expertos que entienden tus necesidades académicas específicas.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 text-center p-4">
        <div class="mb-3">
          <i class="bi bi-clock-history text-primary" style="font-size: 3rem;"></i>
        </div>
        <h5 class="card-title">Organización y Seguimiento</h5>
        <p class="card-text">Lleva un registro de tus consultas, pendientes, progreso y próximas sesiones de forma centralizada.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 text-center p-4">
        <div class="mb-3">
          <i class="bi bi-folder-symlink-fill text-warning" style="font-size: 3rem;"></i>
        </div>
        <h5 class="card-title">Recursos Académicos Centralizados</h5>
        <p class="card-text">Accede fácilmente a guías, enlaces, tutoriales y materiales de apoyo organizados por materia y tema.</p>
      </div>
    </div>
  </div>
</section>

<!-- Agrega esta línea en el head si no tienes los íconos de Bootstrap activados -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> -->


<!-- Sección de Beneficios -->
<div class="container-es py-5 bg-light">
  <h2 class="text-center mb-5">Beneficios para Docentes, Mentores e Institución</h2>
  <div class="row align-items-center">
    <div class="col-md-6">
      <ul class="list-group">
        <li class="list-group-item">✔ Centralización eficiente de asesorías y recursos educativos</li>
        <li class="list-group-item">✔ Mejora en la comunicación y coordinación entre docentes, mentores y estudiantes</li>
        <li class="list-group-item">✔ Facilita el seguimiento académico personalizado para cada estudiante</li>
        <li class="list-group-item">✔ Optimiza el uso del tiempo y reduce la duplicidad de tareas administrativas</li>
        <li class="list-group-item">✔ Genera reportes útiles para la toma de decisiones institucionales</li>
      </ul>
    </div>
    <div class="col-md-6">
      <img src="IMAGES/unnamed.png" class="img-fluid rounded" alt="Beneficios de la plataforma académica">
    </div>
  </div>
</div>



      <section class="container my-5">
  <div class="container-es py-5">
    <h2 class="text-center mb-4 display-6 fw-bold text-success">Preguntas Frecuentes</h2>
    <p class="text-center text-muted mb-5">Aquí resolvemos las dudas más comunes sobre el uso y beneficios de la plataforma de asesorías académicas del TecNM Celaya</p>

    <div class="accordion shadow-lg rounded" id="faqAccordion">

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq1">
          <button 
            class="accordion-button" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#collapse1" 
            aria-expanded="true" 
            aria-controls="collapse1"
          >
            ¿Qué es la plataforma de asesorías académicas del TecNM Celaya?
          </button>
        </h2>
        <div 
          id="collapse1" 
          class="accordion-collapse collapse show" 
          aria-labelledby="faq1"
          data-bs-parent=""
        >
          <div class="accordion-body">
            Es un sistema web diseñado para centralizar y facilitar la gestión de asesorías académicas, recursos educativos y seguimiento entre docentes, mentores y estudiantes del TecNM campus Celaya.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq2">
          <button 
            class="accordion-button" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#collapse2" 
            aria-expanded="true" 
            aria-controls="collapse2"
          >
            ¿Quiénes pueden usar la plataforma?
          </button>
        </h2>
        <div 
          id="collapse2" 
          class="accordion-collapse collapse show" 
          aria-labelledby="faq2"
          data-bs-parent=""
        >
          <div class="accordion-body">
            Docentes, mentores y estudiantes del TecNM campus Celaya pueden registrarse para acceder a las funcionalidades según su rol, como agendar asesorías, compartir recursos y hacer seguimiento académico.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq3">
          <button 
            class="accordion-button" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#collapse3" 
            aria-expanded="true" 
            aria-controls="collapse3"
          >
            ¿Cómo agendo una asesoría académica?
          </button>
        </h2>
        <div 
          id="collapse3" 
          class="accordion-collapse collapse show" 
          aria-labelledby="faq3"
          data-bs-parent=""
        >
          <div class="accordion-body">
            Dentro de tu panel de usuario, puedes consultar la disponibilidad de mentores o docentes y solicitar una cita para asesoría, seleccionando fecha, hora y modalidad (presencial o virtual).
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq4">
          <button 
            class="accordion-button" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#collapse4" 
            aria-expanded="true" 
            aria-controls="collapse4"
          >
            ¿Qué tipo de recursos educativos puedo encontrar en la plataforma?
          </button>
        </h2>
        <div 
          id="collapse4" 
          class="accordion-collapse collapse show" 
          aria-labelledby="faq4"
          data-bs-parent=""
        >
          <div class="accordion-body">
            Podrás acceder a materiales como apuntes, guías, videos, presentaciones y otros documentos organizados por asignatura y mentor, facilitando el estudio y preparación académica.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq5">
          <button 
            class="accordion-button" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#collapse5" 
            aria-expanded="true" 
            aria-controls="collapse5"
          >
            ¿Cómo se realiza el seguimiento del progreso académico?
          </button>
        </h2>
        <div 
          id="collapse5" 
          class="accordion-collapse collapse show" 
          aria-labelledby="faq5"
          data-bs-parent=""
        >
          <div class="accordion-body">
            La plataforma permite que mentores y docentes registren avances, observaciones y recomendaciones sobre cada estudiante, facilitando el monitoreo y apoyo personalizado en su desarrollo académico.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq6">
          <button 
            class="accordion-button" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#collapse6" 
            aria-expanded="true" 
            aria-controls="collapse6"
          >
            ¿Qué medidas de seguridad y privacidad tiene la plataforma?
          </button>
        </h2>
        <div 
          id="collapse6" 
          class="accordion-collapse collapse show" 
          aria-labelledby="faq6"
          data-bs-parent=""
        >
          <div class="accordion-body">
            La plataforma utiliza autenticación segura, control de roles y protección de datos personales conforme a las normas institucionales para garantizar la confidencialidad y seguridad de la información académica.
          </div>
        </div>
      </div>

    </div>
  </div>
</section>



<!-- Sección de Sesiones y Capacitación -->
<div class="container-es py-5">
  <h2 class="text-center mb-5">Sesiones y Capacitación</h2>
  <div class="row">

    <div class="col-md-4">
      <div class="card mb-4">
        <img src="IMAGES/tec.jpeg" class="card-img-top" alt="Taller de Metodologías Didácticas">
        <div class="card-body text-center">
          <h4 class="card-title">Taller de Metodologías Didácticas</h4>
          <p class="card-text">Capacitación para docentes y mentores en técnicas modernas de enseñanza y asesoría.</p>
          <a href="#" class="btn btn-primary">Más Información</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-4">
        <img src="IMAGES/uso.png" class="card-img-top" alt="Webinar de Uso de la Plataforma">
        <div class="card-body text-center">
          <h4 class="card-title">Webinar: Uso de la Plataforma</h4>
          <p class="card-text">Sesión online para aprender a utilizar todas las funcionalidades de la plataforma.</p>
          <a href="#" class="btn btn-primary">Registrarse</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-4">
        <img src="IMAGES/ppa.jpg" class="card-img-top" alt="Asesoría Grupal para Estudiantes">
        <div class="card-body text-center">
          <h4 class="card-title">Asesoría Grupal para Estudiantes</h4>
          <p class="card-text">Sesiones grupales para resolver dudas frecuentes y fortalecer habilidades académicas.</p>
          <a href="#" class="btn btn-primary">Participar</a>
        </div>
      </div>
    </div>

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