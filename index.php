<!doctype html>
<html lang="es">

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
  <title>SakilaDB©</title>
</head>

<body>
  <header>
    <div class="container_logo">
      <img src="IMAGES/logh.jpg" width="300" alt="LOGO CONECTATEC">
    </div>
  </header>

  <div id="wrapper">
    <div class="container-fluid" style="padding: 0; margin:0; max-width: 100%;">
      <div class="row" style="max-width: 101%;">
        <div class="col-sm" style="margin: 0; padding: 0;">
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark navegacion" style="max-width: 100%;">
            <a class="navbar-brand" style="margin-left: 3%;" href="index.php"><span
                class="letra-logo">SakilaDB</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="margin: 0; padding: 0;">
              <ul class="navbar-nav">

                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="admin/marca.php"><span class="navegacion-color-item">Actores</span></a>
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
    <h1 class="display-4 fw-bold">Base de datos de Sakila</h1>
    <p class="lead">Sistema de pruebas de la base de datos de Sakila</p>
  </div>
</section>





<!-- Sección de Historia -->
<div class="container-es py-5" style="margin-bottom: 3%;">
  <div class="row">
    <div class="col-md-6">
      <h2 class="mb-4">¿Qué es la base de datos Sakila?</h2>
      <p class="lead" style="text-align: justify;">
        La base de datos Sakila fue creada como un ejemplo oficial de MySQL para mostrar cómo manejar un sistema de alquiler de películas, con una estructura realista que incluye clientes, tiendas, empleados y catálogos de películas.
      </p>
      <p style="text-align: justify;">
        Sakila integra información organizada en tablas relacionadas, lo que permite gestionar de manera eficiente la renta de películas, el historial de los clientes, la disponibilidad de inventario y la clasificación de los filmes en distintas categorías. Este proyecto se utiliza ampliamente para prácticas, enseñanza y pruebas en bases de datos.
      </p>
    </div>
    <div class="col-md-6">
      <img src="IMAGES/centra.jpg" class="img-fluid rounded" alt="Historia de Sakila">
    </div>
  </div>
</div>


<!-- Sección de Misión y Visión -->
<div class="container-es bg-light py-5" style="margin-bottom: 3%;">
  <div class="row">
    <div class="col-md-6">
      <h2 class="mb-4">Nuestra Misión</h2>
      <p class="lead">
        Proveer un sistema de gestión de video rental eficiente y completo que permita consultar, actualizar y analizar información sobre películas, clientes y alquileres de manera rápida y confiable.
      </p>
    </div>
    <div class="col-md-6">
      <h2 class="mb-4">Nuestra Visión</h2>
      <p class="lead">
        Ser la base de datos de referencia para demostraciones, pruebas y estudios de sistemas de gestión de entretenimiento, facilitando la comprensión de relaciones entre clientes, inventario y transacciones.
      </p>
    </div>
  </div>
</div>

<!-- Qué centraliza la base de datos Sakila -->
<div  class="container-es text-white p-5 rounded" style="margin-bottom: 3%;">
  <h2 class="text-center mb-4">¿Qué centraliza la base de datos Sakila?</h2>
  <ul class="lead">
    <li style="color:black !important;">🎬 Información de películas y categorías.</li>
    <li style="color:black !important;">👤 Datos de clientes y sus preferencias de alquiler.</li>
    <li style="color:black !important;">🏢 Información de sucursales y empleados.</li>
    <li style="color:black !important;">📆 Registro de alquileres y pagos realizados.</li>
    <li style="color:black !important;">📊 Estadísticas de inventario y rendimiento de la tienda.</li>
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
  <h2 class="text-center mb-4">Beneficios de la base de datos Sakila</h2>
  <p class="text-center text-muted mb-5">Descubre cómo Sakila facilita el aprendizaje y la gestión de información en sistemas de video rental.</p>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 text-center p-4">
        <div class="mb-3">
          <i class="bi bi-film text-success" style="font-size: 3rem;"></i>
        </div>
        <h5 class="card-title">Catálogo de Películas</h5>
        <p class="card-text">Explora y gestiona información completa de películas, categorías y actores, ideal para prácticas de consultas SQL.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 text-center p-4">
        <div class="mb-3">
          <i class="bi bi-people-fill text-primary" style="font-size: 3rem;"></i>
        </div>
        <h5 class="card-title">Gestión de Clientes y Alquileres</h5>
        <p class="card-text">Realiza seguimiento de clientes, historial de alquileres y pagos, aprendiendo relaciones entre tablas y llaves foráneas.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 text-center p-4">
        <div class="mb-3">
          <i class="bi bi-bar-chart-fill text-warning" style="font-size: 3rem;"></i>
        </div>
        <h5 class="card-title">Análisis de Inventario y Rendimiento</h5>
        <p class="card-text">Obtén estadísticas sobre disponibilidad de películas, actividad de sucursales y desempeño del negocio para prácticas analíticas.</p>
      </div>
    </div>
  </div>
</section>


<!-- Agrega esta línea en el head si no tienes los íconos de Bootstrap activados -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> -->


<!-- Sección de Beneficios -->
<div class="container-es py-5 bg-light">
  <h2 class="text-center mb-5">Beneficios de usar la base de datos Sakila</h2>
  <div class="row align-items-center">
    <div class="col-md-6">
      <ul class="list-group">
        <li class="list-group-item">✔ Permite practicar consultas SQL sobre un esquema realista de video rental.</li>
        <li class="list-group-item">✔ Facilita la comprensión de relaciones entre tablas y llaves foráneas.</li>
        <li class="list-group-item">✔ Ayuda a analizar datos de clientes, inventario y transacciones de manera organizada.</li>
        <li class="list-group-item">✔ Genera reportes de estadísticas y métricas para ejercicios prácticos de análisis de datos.</li>
        <li class="list-group-item">✔ Sirve como recurso educativo para enseñar bases de datos relacionales de forma didáctica.</li>
      </ul>
    </div>
    <div class="col-md-6">
      <img src="IMAGES/sakila.png" class="img-fluid rounded" alt="Beneficios de la base de datos Sakila">
    </div>
  </div>
</div>

<section class="container my-5">
  <div class="container-es py-5">
    <h2 class="text-center mb-4 display-6 fw-bold text-success">Preguntas Frecuentes</h2>
    <p class="text-center text-muted mb-5">Resolvemos las dudas más comunes sobre el uso y aprendizaje de la base de datos Sakila.</p>

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
            ¿Qué es la base de datos Sakila?
          </button>
        </h2>
        <div 
          id="collapse1" 
          class="accordion-collapse collapse show" 
          aria-labelledby="faq1"
          data-bs-parent=""
        >
          <div class="accordion-body">
            Sakila es una base de datos de ejemplo para sistemas de video rental que contiene información de películas, clientes, empleados, sucursales y transacciones, ideal para aprender y practicar SQL.
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
            ¿Quién puede usar la base de datos Sakila?
          </button>
        </h2>
        <div 
          id="collapse2" 
          class="accordion-collapse collapse show" 
          aria-labelledby="faq2"
          data-bs-parent=""
        >
          <div class="accordion-body">
            Estudiantes, docentes y desarrolladores pueden utilizar Sakila para practicar consultas, aprender sobre relaciones entre tablas y simular operaciones de un sistema de alquiler de películas.
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
            ¿Qué tipo de información contiene Sakila?
          </button>
        </h2>
        <div 
          id="collapse3" 
          class="accordion-collapse collapse show" 
          aria-labelledby="faq3"
          data-bs-parent=""
        >
          <div class="accordion-body">
            Incluye datos de películas, actores, categorías, clientes, empleados, sucursales, inventario, alquileres y pagos, ofreciendo un esquema completo para ejercicios prácticos.
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
            ¿Para qué se utiliza Sakila en la educación?
          </button>
        </h2>
        <div 
          id="collapse4" 
          class="accordion-collapse collapse show" 
          aria-labelledby="faq4"
          data-bs-parent=""
        >
          <div class="accordion-body">
            Se utiliza como herramienta didáctica para enseñar SQL, relaciones entre tablas, llaves primarias y foráneas, consultas complejas y análisis de datos en un contexto realista.
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
            ¿Cómo puedo empezar a practicar con Sakila?
          </button>
        </h2>
        <div 
          id="collapse5" 
          class="accordion-collapse collapse show" 
          aria-labelledby="faq5"
          data-bs-parent=""
        >
          <div class="accordion-body">
            Puedes descargar la base de datos Sakila y cargarla en tu servidor MySQL o MariaDB, luego usar consultas SQL para explorar las tablas, relaciones y realizar ejercicios prácticos.
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
            ¿Es gratuita la base de datos Sakila?
          </button>
        </h2>
        <div 
          id="collapse6" 
          class="accordion-collapse collapse show" 
          aria-labelledby="faq6"
          data-bs-parent=""
        >
          <div class="accordion-body">
            Sí, Sakila es de uso libre y puede descargarse gratuitamente desde el sitio oficial de MySQL para fines educativos y de práctica.
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Sección de Sesiones y Capacitación -->
<div class="container-es py-5">
  <h2 class="text-center mb-5">Sesiones y Capacitación Sakila</h2>
  <div class="row">

    <div class="col-md-4">
      <div class="card mb-4">
        <img src="IMAGES/tec.jpeg" class="card-img-top" alt="Taller de Consultas SQL">
        <div class="card-body text-center">
          <h4 class="card-title">Taller de Consultas SQL</h4>
          <p class="card-text">Capacitación práctica para aprender a realizar consultas, joins y análisis de datos sobre la base de datos Sakila.</p>
          <a href="#" class="btn btn-primary">Más Información</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-4">
        <img src="IMAGES/uso.png" class="card-img-top" alt="Webinar Uso de Sakila">
        <div class="card-body text-center">
          <h4 class="card-title">Webinar: Uso de Sakila</h4>
          <p class="card-text">Sesión online para aprender a navegar, explorar y analizar la base de datos Sakila de forma efectiva.</p>
          <a href="#" class="btn btn-primary">Registrarse</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-4">
        <img src="IMAGES/ppa.jpg" class="card-img-top" alt="Ejercicios Grupales Sakila">
        <div class="card-body text-center">
          <h4 class="card-title">Ejercicios Grupales</h4>
          <p class="card-text">Sesiones colaborativas para resolver ejercicios de SQL, relaciones entre tablas y análisis de inventario y clientes.</p>
          <a href="#" class="btn btn-primary">Participar</a>
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