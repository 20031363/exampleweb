<?php
require_once(__DIR__.'/models/cita.php');
$web = new Cita();
if(!$web->checar('Cliente')) {
    header('Location: /conectatec/index.php'); 
    exit; 
}
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
  <link href="./../CSS/carrito.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ConectaTEC©</title>
<style>
                        body {
                            font-family: 'Roboto', sans-serif;
                            background: #f7f7f7;
                            padding: 0rem;
                        }
                        h1 {
                            color: #2c3e50;
                        }
                        .curso {
                            background: #fff;
                            border-radius: 12px;
                            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
                            padding: 20px;
                            margin-bottom: 30px;
                        }
                        .curso h2 {
                            color: #1abc9c;
                        }
                        .botones a {
                            display: inline-block;
                            margin-top: 10px;
                            text-decoration: none;
                            background: #3498db;
                            color: #fff;
                            padding: 10px 15px;
                            border-radius: 8px;
                        }
                        .botones a:hover {
                            background: #2980b9;
                        }
                        form {
                            margin-top: 15px;
                        }
                        textarea {
                            width: 100%;
                            padding: 10px;
                            border-radius: 8px;
                            border: 1px solid #ccc;
                            resize: none;
                        }
                        select, button {
                            margin-top: 10px;
                            padding: 10px;
                            border-radius: 8px;
                            border: none;
                        }
                        button {
                            background: #2ecc71;
                            color: #fff;
                            cursor: pointer;
                        }
                        button:hover {
                            background: #27ae60;
                        }
                    </style>

</head>


<body>

    <header>
        <div class="container_logo">
          <img src="./../IMAGES/log.png" width="300" alt="LOGO ESMERALDA">
        </div>
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
                  <a class="nav-link" href="../index.php"><span class="navegacion-color-item">Inicio</span></a>
                </li>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="../blog.php"><span class="navegacion-color-item">Blog</span></a>
                </li>


                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="../about.php"><span class="navegacion-color-item">About</span></a>
                </li>

                <?php if(!$web->checar('Cliente')): ?>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="login.php"><span class="navegacion-color-item">Login</span></a>
                </li>
                <?php endif; ?>

                <?php if($web->checar('Cliente')): ?>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="login.php?accion=logout"><span class="navegacion-color-item">Cerrar</span></a>
                </li>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="cuenta.php"><span class="navegacion-color-item">Cuenta</span></a>
                </li>
                <li class="nav-item navegacion-item">
                  <a class="nav-link" href="carrito.php"><span class="navegacion-color-item">Acciones</span></a>
                </li>
                <?php endif; ?>

                <li class="nav-item dropdown navegacion-item">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="navegacion-color-item">Mas</span>
                  </a>
                  <div class="dropdown-menu variant" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item variant-son" href="../mentorias.php">Mentorias</a>
                    <a class="dropdown-item variant-son" href="../materias.php">Materias</a>
                    <a class="dropdown-item variant-son" href="../noticias.php">Noticias</a>
                    <a class="dropdown-item variant-son" href="../biblioteca.php">Biblioteca</a>
                    <a class="dropdown-item variant-son" href="../rendimiento.php">CalTEC</a>
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
    </header>



<div class="container-fluid">
  <div class="row">
    <!-- Sidebar Izquierdo -->
    <div class="col-auto bg-dark text-white d-flex flex-column align-items-center py-4 min-vh-100" style="width: 80px;">
      <img src="../IMAGES/log.png" alt="Logo" class="mb-4" style="width: 40px;">
      <a href="#" class="text-white text-center mb-3" data-bs-toggle="tooltip" title="Dashboard">
        <i class="fas fa-tachometer-alt fa-lg"></i>
      </a>
      <a href="#" class="text-white text-center mb-3" data-bs-toggle="tooltip" title="Courses">
        <i class="fas fa-book fa-lg"></i>
      </a>
      <a href="#" class="text-white text-center mb-3" data-bs-toggle="tooltip" title="Groups">
        <i class="fas fa-users fa-lg"></i>
      </a>
      <a href="#" class="text-white text-center mb-3" data-bs-toggle="tooltip" title="Calendar">
        <i class="fas fa-calendar-alt fa-lg"></i>
      </a>
      <a href="#" class="text-white text-center mb-3" data-bs-toggle="tooltip" title="Inbox">
        <i class="fas fa-inbox fa-lg"></i>
      </a>
      <a href="#" class="text-white text-center mb-3" data-bs-toggle="tooltip" title="Account">
        <i class="fas fa-user-circle fa-lg"></i>
      </a>
      <a href="#" class="text-white text-center mt-auto mb-3" data-bs-toggle="tooltip" title="Help">
        <i class="fas fa-question-circle fa-lg"></i>
      </a>
    </div>


    <div style="margin-top:5%; margin-bottom:5%;" class="container-es col px-5 py-4">
        <h1 class="mb-5 text-center" style="font-family:'Quicksand', serif; color:rgb(34, 53, 17);">
        👤 Cuenta de <?php echo ($_SESSION['correo']); ?>
        </h1>




    <?php


            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            require_once(__DIR__ . '/config.php'); 
            require_once(__DIR__ . '/model.php'); 
            $model = new Model();
            $model->conectar();
            $pdo = $model->conexion;

            $correo = $_SESSION['correo'];

           // CURSOS comprados
                $sqlCursos = "
                SELECT 
                    c.id_curso,
                    c.curso AS titulo,
                    c.link,
                    c.fotografia,
                    rc.comentario,
                    rc.calificacion
                FROM usuario u
                JOIN cliente cl ON u.id_usuario = cl.id_usuario
                JOIN transaccion t ON cl.id_cliente = t.id_cliente
                JOIN transaccion_detalle_cursos tdc ON t.id_transaccion = tdc.id_transaccion
                JOIN Cursos c ON c.id_curso = tdc.id_curso
                LEFT JOIN resena_curso rc ON rc.id_cliente = cl.id_cliente AND rc.id_curso = c.id_curso
                WHERE u.correo = :correo
                ";
                $stmt = $pdo->prepare($sqlCursos);
                $stmt->execute(['correo' => $correo]);
                $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // PLANES comprados
                $sqlPlanes = "
                SELECT 
                    p.id_plan,
                    p.nombre_plan AS titulo,
                    p.archivo_pdf,
                    p.fotografia,
                    rp.comentario,
                    rp.calificacion
                FROM usuario u
                JOIN cliente cl ON u.id_usuario = cl.id_usuario
                JOIN transaccion t ON cl.id_cliente = t.id_cliente
                JOIN transaccion_detalle_planes tdp ON t.id_transaccion = tdp.id_transaccion
                JOIN plan_nutricional p ON p.id_plan = tdp.id_plan
                LEFT JOIN resena_plan rp ON rp.id_cliente = cl.id_cliente AND rp.id_plan = p.id_plan
                WHERE u.correo = :correo
                ";
                $stmt = $pdo->prepare($sqlPlanes);
                $stmt->execute(['correo' => $correo]);
                $planes = $stmt->fetchAll(PDO::FETCH_ASSOC);


        // PRODUCTOS comprados
            $sqlProductos = "
            SELECT 
                p.id_producto,
                p.producto AS titulo,
                p.fotografia,
                rp.comentario,
                rp.calificacion
            FROM usuario u
            JOIN cliente cl ON u.id_usuario = cl.id_usuario
            JOIN transaccion t ON cl.id_cliente = t.id_cliente
            JOIN transaccion_detalle td ON t.id_transaccion = td.id_transaccion
            JOIN producto p ON p.id_producto = td.id_producto
            LEFT JOIN resena_producto rp ON rp.id_cliente = cl.id_cliente AND rp.id_producto = p.id_producto
            WHERE u.correo = :correo
            ";
            $stmt = $pdo->prepare($sqlProductos);
            $stmt->execute(['correo' => $correo]);
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);


            // Obtener empleados asignados al cliente por transacciones
            $sqlEmpleados = "
            SELECT DISTINCT e.empleado_id, e.nombre, e.primer_apellido, e.segundo_apellido
            FROM usuario u
            JOIN cliente cl ON u.id_usuario = cl.id_usuario
            JOIN transaccion t ON cl.id_cliente = t.id_cliente
            JOIN empleado e ON e.empleado_id = t.empleado_id
            WHERE u.correo = :correo
            ";
            $stmt = $pdo->prepare($sqlEmpleados);
            $stmt->execute(['correo' => $correo]);
            $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);



            // Citas agendadas del cliente
            $sqlCitas = "
            SELECT c.titulo, c.descripcion, c.fecha_cita, l.lugar,
                  e.nombre AS empleado_nombre, e.primer_apellido
            FROM usuario u
            JOIN cliente cl ON u.id_usuario = cl.id_usuario
            JOIN cita c ON c.id_cliente = cl.id_cliente
            JOIN lugar l ON c.id_lugar = l.id_lugar
            JOIN empleado e ON c.empleado_id = e.empleado_id
            WHERE u.correo = :correo
            ORDER BY c.fecha_cita DESC
            ";
            $stmt = $pdo->prepare($sqlCitas);
            $stmt->execute(['correo' => $correo]);
            $citas = $stmt->fetchAll(PDO::FETCH_ASSOC);



            // Lugares
            $sqlLugares = "SELECT * FROM lugar";
            $stmt = $pdo->prepare($sqlLugares);
            $stmt->execute();
            $lugares = $stmt->fetchAll();










            ?>
        <section>

                    <h1  style="text-align:center;">Tus Materias</h1>
                    <?php foreach ($cursos as $curso): ?>
                    <div  style="text-align:center;" class="curso">
                        <h2><?= htmlspecialchars($curso['titulo']) ?></h2>
                         <img style="align-items:center;max-width:50%;" src="<?php echo '../uploads/'.$curso['fotografia']; ?>" class="card-img-top">
                        <a href="<?= htmlspecialchars($curso['link']) ?>" target="_blank">Ir al Curso</a>
                        <?php if ($curso['comentario']): ?>
                            <p>Tu reseña: <?= $curso['comentario'] ?> (⭐ <?= $curso['calificacion'] ?>/5)</p>
                        <?php else: ?>
                            <form method="post" action="guardar_resena.php">
                                <input type="hidden" name="tipo" value="curso">
                                <input type="hidden" name="id" value="<?= $curso['id_curso'] ?>">
                                <textarea name="comentario" required></textarea>
                                <select name="calificacion">
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                                <button>Enviar Reseña</button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>


                    <h1  style="text-align:center;" style="text-align:center;">Tus Mentorias(inscrito)</h1>
                    <?php foreach ($planes as $plan): ?>
                    <div  style="text-align:center;" class="curso">
                        <h2><?= htmlspecialchars($plan['titulo']) ?></h2>
                        <img style="align-items:center;max-width:50%;" src="<?php echo '../uploads/'.$plan['fotografia']; ?>" class="card-img-top">
                        <a href="/conectatec/uploads/<?= htmlspecialchars($plan['archivo_pdf']) ?>" target="_blank">Ver Plan PDF</a>
                        <?php if ($plan['comentario']): ?>
                            <p>Tu reseña: <?= $plan['comentario'] ?> (⭐ <?= $plan['calificacion'] ?>/5)</p>
                        <?php else: ?>
                            <form method="post" action="guardar_resena.php">
                                <input type="hidden" name="tipo" value="plan">
                                <input type="hidden" name="id" value="<?= $plan['id_plan'] ?>">
                                <textarea name="comentario" required></textarea>
                                <select name="calificacion">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                                </select>
                                <button>Enviar Reseña</button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>


                    <h1  style="text-align:center;">Libros Solicitados(prestamos de recurso digital)</h1>
                        <?php foreach ($productos as $prod): ?>
                        <div  style="text-align:center;" class="curso">
                            <h2><?= htmlspecialchars($prod['titulo']) ?></h2>
                            <img src="/conectatec/uploads/<?= htmlspecialchars($prod['fotografia']) ?>" alt="producto" width="200"><br>
                            <?php if ($prod['comentario']): ?>
                                <p>K: <?= htmlspecialchars($prod['comentario']) ?> (⭐ <?= $prod['calificacion'] ?>/5)</p>
                            <?php else: ?>
                                <form method="post" action="guardar_resena.php">
                                    <input type="hidden" name="tipo" value="producto">
                                    <input type="hidden" name="id" value="<?= $prod['id_producto'] ?>">
                                    <textarea name="comentario" rows="3" placeholder="Escribe tu reseña..."></textarea><br>
                                    <label for="calificacion">Calificación:</label>
                                    <select name="calificacion" required>
                                        <option value="5">5 - Excelente</option>
                                        <option value="4">4 - Muy bueno</option>
                                        <option value="3">3 - Bueno</option>
                                        <option value="2">2 - Regular</option>
                                        <option value="1">1 - Malo</option>
                                    </select><br>
                                    <button type="submit">Enviar Reseña</button>
                                </form>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>



                        <style>
    .form-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 25px;
        background-color: #f8f9fa;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .form-container h2 {
        text-align: center;
        color: #343a40;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #495057;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 6px;
        font-size: 14px;
    }

    .form-group textarea {
        resize: vertical;
    }

    .form-group button {
        width: 100%;
        padding: 12px;
        background-color: #198754;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #157347;
    }

    .citas-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        background-color: #fff;
        border-left: 4px solid #198754;
        border-radius: 8px;
    }

    .citas-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #343a40;
    }

    .cita {
        border-bottom: 1px solid #dee2e6;
        padding: 10px 0;
    }

    .cita:last-child {
        border-bottom: none;
    }

    .cita strong {
        color: #212529;
        font-size: 16px;
    }

    .cita small {
        color: #6c757d;
    }
</style>

<div class="form-container">
    <h2>Agendar Cita</h2>
    <form method="post" action="agendar_cita.php">
        <div class="form-group">
            <label for="titulo">Motivo:</label>
            <input type="text" name="titulo" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" required></textarea>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha y hora:</label>
            <input type="datetime-local" name="fecha_cita" id="fecha_cita" required min="<?= date('Y-m-d\TH:i', strtotime('+1 day')) ?>">
        </div>

        <div class="form-group">
            <label for="lugar">Lugar:</label>
            <select name="id_lugar" required>
                <?php foreach ($lugares as $lugar): ?>
                    <option value="<?= $lugar['id_lugar'] ?>">
                        <?= $lugar['lugar'] . ' (Lat: ' . $lugar['latitud'] . ', Long: ' . $lugar['longitud'] . ')' ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="empleado">Solicitar a (puede variar):</label>
            <select name="empleado_id" required>
                <?php foreach ($empleados as $empleado): ?>
                    <option value="<?= $empleado['empleado_id'] ?>">
                        <?= $empleado['nombre'] . ' ' . $empleado['primer_apellido'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit">Agendar Cita</button>
        </div>
    </form>
</div>

<div class="citas-container">
    <h2>Tus Citas Agendadas</h2>
    <?php if ($citas): ?>
        <?php foreach ($citas as $cita): ?>
            <div class="cita">
                <strong><?= htmlspecialchars($cita['titulo']) ?></strong><br>
                <?= htmlspecialchars($cita['descripcion']) ?><br>
                <small>Con: <?= htmlspecialchars($cita['empleado_nombre']) . ' ' . $cita['primer_apellido'] ?></small><br>
                <small>En: <?= htmlspecialchars($cita['lugar']) ?></small><br>
                <small>Fecha: <?= date("d M Y, H:i", strtotime($cita['fecha_cita'])) ?></small>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align: center;">No tienes citas programadas.</p>
    <?php endif; ?>
</div>







        </section>


</div>

<!-- Lateral Derecho (Por hacer / Próximamente / Retroalimentación) -->
<div class="col-md-3 border-start bg-light px-4 py-4">
  <h5 class="mb-3">Por hacer</h5>
  <ul class="list-group mb-4">
    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div>
        <strong>Entregar trabajo en equipo</strong><br>
        <small class="text-muted">Fecha límite: 5 de octubre, 11:59 p.m.</small>
      </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div>
        <strong>Subir video de presentación</strong><br>
        <small class="text-muted">Fecha límite: 8 de octubre, 11:59 p.m.</small>
      </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div>
        <strong>Completar formulario de asesoría</strong><br>
        <small class="text-muted">Fecha límite: 10 de octubre, 6:00 p.m.</small>
      </div>
    </li>
  </ul>

  <h5 class="mb-3">Próximamente</h5>
  <ul class="list-group mb-4">
    <li class="list-group-item">
      Evaluación diagnóstica 
      <span class="badge bg-secondary float-end">Lunes</span>
    </li>
    <li class="list-group-item">
      Revisión de proyectos 
      <span class="badge bg-secondary float-end">Martes</span>
    </li>
    <li class="list-group-item">
      Examen parcial 
      <span class="badge bg-secondary float-end">Jueves</span>
    </li>
    <li class="list-group-item">
      Entrevista con tutor 
      <span class="badge bg-secondary float-end">Viernes</span>
    </li>
  </ul>

  <h5 class="mb-3">Retroalimentación reciente</h5>
  <ul class="list-group">
    <li class="list-group-item">
      ✅ Actividad 1: Calificación completa
    </li>
    <li class="list-group-item">
      ✅ Proyecto grupal: 10 de 10
    </li>
    <li class="list-group-item">
      📝 Observaciones sobre entrega final
    </li>
  </ul>

  <div class="mt-4">
    <button class="btn btn-outline-primary w-100">
      Ver calificaciones
    </button>
  </div>
</div>





<div style="background-color: rgb(33, 46, 37)!important; color: white; font-weight:bold; text-align:center;justify-content:center;align-items:center;padding-top:3%;padding-bottom:3%;">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top" style="margin-left:5%;margin-right:5%;padding: 0%; background-color: rgb(33, 46, 37)!important;">
        <p class="col-md-4 mb-0 text-body-secondary" style="color:white !important; font-size:1rem !important; font-weight:bold !important; text-align:center !important; background-color: rgb(33, 46, 37)!important;">ConectaTEC 2025 Company, Inc</p>

        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-md-4 justify-content-end" style="margin-right:0;">
        <li class="nav-item stoic"><a href="#" class="nav-link px-2 text-body-secondary stoic"><span style="text-align:center !important;color:white !important;">Home</span></a></li>
        <li class="nav-item stoic"><a href="#" class="nav-link px-2 text-body-secondary"><span style="text-align:center !important;color:white !important;"> Features</span></a></li>
        <li class="nav-item stoic"><a href="#" class="nav-link px-2 text-body-secondary"><span style="text-align:center !important;color:white !important;">Pricing</span></a></li>
        <li class="nav-item stoic"><a href="#" class="nav-link px-2 text-body-secondary"><span style="text-align:center !important;color:white !important;">FAQs</span></a></li>
        <li class="nav-item stoic"><a href="#" class="nav-link px-2 text-body-secondary"><span style="text-align:center !important;color:white !important;">About</span></a></li>
        </ul>
    </div>
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
