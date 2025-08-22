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
  <link href="CSS/calculadora.css" rel="stylesheet" type="text/css">
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
      

<section class="evaluacion-hero text-center text-white d-flex align-items-center justify-content-center" style="
    background: url('IMAGES/klo.webp') center/cover no-repeat; 
    height: 400px;
    position: relative;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
    <div class="container position-relative">
        <h1 class="display-4 fw-bold">Evaluación de Progreso Académico</h1>
        <p class="lead">Descubre tu nivel de avance y obtén recomendaciones personalizadas para alcanzar tus metas académicas.</p>
    </div>
</section>

<section class="evaluacion-section py-5">
  <div class="container-es">
    <h2 class="text-center mb-5">Evalúa tu Progreso Académico</h2>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm p-4">
          <form id="evaluacionForm">
            <!-- Nivel Académico -->
            <div class="mb-3">
              <label for="nivel" class="form-label">Nivel Académico</label>
              <select class="form-select" id="nivel" required>
                <option value="primer-semestre">Primer Semestre</option>
                <option value="segundo-semestre">Segundo Semestre</option>
                <option value="tercer-semestre">Tercer Semestre</option>
                <option value="cuarto-semestre">Cuarto Semestre</option>
                <option value="quinto-semestre">Quinto Semestre</option>
                <option value="sexto-semestre">Sexto Semestre</option>
                <option value="septimo-semestre">Séptimo Semestre</option>
                <option value="octavo-semestre">Octavo Semestre</option>
                <option value="noveno-semestre">Noveno Semestre</option>
              </select>
            </div>
            <!-- Promedio Actual -->
            <div class="mb-3">
              <label for="promedio" class="form-label">Promedio Actual</label>
              <input type="number" class="form-control" id="promedio" placeholder="Ingresa tu promedio (0-100)" min="0" max="100" required>
            </div>
            <!-- Horas de Estudio -->
            <div class="mb-3">
              <label for="horas" class="form-label">Horas de Estudio Semanales</label>
              <input type="number" class="form-control" id="horas" placeholder="Ingresa tus horas de estudio" min="0" required>
            </div>
            <!-- Materias Cursando -->
            <div class="mb-3">
              <label for="materias" class="form-label">Número de Materias Cursando</label>
              <input type="number" class="form-control" id="materias" placeholder="Ingresa el número de materias" min="1" required>
            </div>
            <!-- Método de Estudio -->
            <div class="mb-3">
              <label for="metodo" class="form-label">Método de Estudio Principal</label>
              <select class="form-select" id="metodo" required>
                <option value="1.0">Lectura básica</option>
                <option value="1.2">Resúmenes y esquemas</option>
                <option value="1.4">Práctica y ejercicios</option>
                <option value="1.6">Grupos de estudio</option>
                <option value="1.8">Tutorías y asesorías</option>
              </select>
            </div>
            <!-- Botón de Evaluar -->
            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-lg">Evaluar Progreso</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sección de Resultados -->
<section id="resultadosSection" class="resultados-section py-5" style="display: none;">
  <div class="container-es">
    <h2 class="text-center mb-5">Resultados de tu Evaluación</h2>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm p-4 text-center">
          <h4 id="resultadoEvaluacion" class="mb-3"></h4>
          <p id="explicacionEvaluacion" class="mb-3"></p>
          <div id="recomendaciones" class="mb-3"></div>
          <a href="javascript:location.reload()" class="btn btn-outline-primary">Realizar Nueva Evaluación</a>
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
  document.getElementById('rendimientoForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const semestre = document.getElementById('semestre').value;
    const materias = parseInt(document.getElementById('materias').value);
    const horas_estudio = parseFloat(document.getElementById('horas_estudio').value);
    const promedio = parseFloat(document.getElementById('promedio').value);
    const dificultad = parseFloat(document.getElementById('dificultad').value);

    if (isNaN(materias) || isNaN(horas_estudio) || isNaN(promedio)) {
      alert("Por favor completa todos los campos correctamente.");
      return;
    }

    let base_rendimiento;
    if (semestre === 'primer-segundo') {
      base_rendimiento = 65 + (horas_estudio * 2.5) + (promedio * 0.8) - (materias * 1.2);
    } else if (semestre === 'tercero-cuarto') {
      base_rendimiento = 70 + (horas_estudio * 3.0) + (promedio * 0.9) - (materias * 1.5);
    } else {
      base_rendimiento = 75 + (horas_estudio * 3.5) + (promedio * 1.0) - (materias * 1.8);
    }

    const rendimiento = Math.round(base_rendimiento * dificultad);

 
    document.getElementById('resultadoRendimiento').innerText = `Tu rendimiento académico estimado es de ${rendimiento} puntos.`;
    document.getElementById('explicacionRendimiento').innerText = "Este cálculo es una estimación basada en tu información académica y nivel de dificultad de tus materias.";
    document.getElementById('resultadosSection').style.display = 'block';

   
    document.getElementById('resultadosSection').scrollIntoView({ behavior: 'smooth' });
  });
</script>

</body>

</html>