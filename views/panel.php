<?php 
require_once(__DIR__.'/../admin/model.php');
$app = new Model();

if(!($app->checar('Nutricionista') || $app->checar('Coach') || $app->checar('Doctor') )) {
    header('Location: /conectatec/index.php'); 
    exit; 
}

?>

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

<section class="col px-5 py-4">

    <h1 class="mb-5 text-center" style="font-family:'Quicksand', serif; color:rgb(34, 53, 17);">
            👤 Cuenta de <?php echo ($_SESSION['correo']); ?>
    </h1>

    <?php


                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                require_once(__DIR__ . '/../admin/config.php'); 
                require_once(__DIR__.'/../admin/model.php');
                $model = new Model();
                $model->conectar();
                $pdo = $model->conexion;

                $correo = $_SESSION['correo'] ?? null;

               
                $stmt = $pdo->prepare("SELECT id_usuario FROM usuario WHERE correo = ?");
                $stmt->execute([$correo]);
                $usuario = $stmt->fetch();
                $id_usuario = $usuario['id_usuario'] ?? null;

             
                $stmt = $pdo->prepare("SELECT empleado_id FROM empleado WHERE id_usuario = ?");
                $stmt->execute([$id_usuario]);
                $empleado = $stmt->fetch();
                $empleado_id = $empleado['empleado_id'] ?? null;


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
                    ";
                    $stmt = $pdo->prepare($sqlCursos);
                    $stmt->execute();
                    $cursos = $stmt->fetchAll();

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
                    ";
                    $stmt = $pdo->prepare($sqlPlanes);
                    $stmt->execute();
                    $planes = $stmt->fetchAll();


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
                ";
                $stmt = $pdo->prepare($sqlProductos);
                $stmt->execute();
                $productos = $stmt->fetchAll();


              
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


                $sqlCitas = "
                    SELECT c.id_cita, c.titulo, c.descripcion, c.fecha_cita, l.lugar,
                        cl.nombre AS cliente_nombre, cl.primer_apellido AS cliente_apellido
                    FROM cita c
                    JOIN lugar l ON c.id_lugar = l.id_lugar
                    JOIN cliente cl ON c.id_cliente = cl.id_cliente
                    WHERE c.empleado_id = ?
                    ORDER BY c.fecha_cita ASC
                ";
                $stmt = $pdo->prepare($sqlCitas);
                $stmt->execute([$empleado_id]);
                $citas = $stmt->fetchAll(PDO::FETCH_ASSOC);




                // Lugares
                $sqlLugares = "SELECT * FROM lugar";
                $stmt = $pdo->prepare($sqlLugares);
                $stmt->execute();
                $lugares = $stmt->fetchAll();

              
                $sqlCursos = "
                SELECT id_curso, curso AS titulo, link, fotografia
                FROM Cursos
                WHERE empleado_id = ?
                ";
                $stmt = $pdo->prepare($sqlCursos);
                $stmt->execute([$empleado_id]);
                $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

               
                $sqlPlanes = "
                SELECT id_plan, nombre_plan AS titulo, archivo_pdf, fotografia
                FROM plan_nutricional
                WHERE empleado_id = ?
                ";
                $stmt = $pdo->prepare($sqlPlanes);
                $stmt->execute([$empleado_id]);
                $planes = $stmt->fetchAll(PDO::FETCH_ASSOC);

           
                $sqlResenasCurso = "
                SELECT rc.comentario, rc.calificacion, c.curso AS titulo
                FROM resena_curso rc
                JOIN Cursos c ON rc.id_curso = c.id_curso
                WHERE c.empleado_id = ?
                ";
                $stmt = $pdo->prepare($sqlResenasCurso);
                $stmt->execute([$empleado_id]);
                $resenasCursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

           
                $sqlResenasPlan = "
                SELECT rp.comentario, rp.calificacion, p.nombre_plan AS titulo
                FROM resena_plan rp
                JOIN plan_nutricional p ON rp.id_plan = p.id_plan
                WHERE p.empleado_id = ?
                ";
                $stmt = $pdo->prepare($sqlResenasPlan);
                $stmt->execute([$empleado_id]);
                $resenasPlanes = $stmt->fetchAll(PDO::FETCH_ASSOC);


                ?>



<section style="margin:3%;margin-left:5%;margin-right:5%;" class="col px-5 py-4">


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


    .canvas-sidebar {
  position: fixed;
  top: 0;
  left: 0;
  width: 80px;
  height: 100%;
  background-color: #2c2c2c;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-top: 15px;
  z-index: 999;
}

.canvas-logo {
  width: 40px;
  margin-bottom: 30px;
}

.nav-links {
  list-style: none;
  padding: 0;
  width: 100%;
}

.nav-links li {
  width: 100%;
  text-align: center;
  margin: 15px 0;
}

.nav-links a {
  color: white;
  text-decoration: none;
  display: flex;
  flex-direction: column;
  align-items: center;
  font-size: 12px;
}

.nav-links i {
  font-size: 20px;
  margin-bottom: 5px;
}

</style>



<div class="citas-container">
        <h2>Citas que debo atender</h2>
        <?php if ($citas): ?>
            <?php foreach ($citas as $cita): ?>
                <div class="cita">
                    <strong><?= htmlspecialchars($cita['titulo']) ?></strong><br>
                    <?= htmlspecialchars($cita['descripcion']) ?><br>
                    <small>Cliente: <?= htmlspecialchars($cita['cliente_nombre']) . ' ' . htmlspecialchars($cita['cliente_apellido']) ?></small><br>
                    <small>En: <?= htmlspecialchars($cita['lugar']) ?></small><br>
                    <small>Fecha: <?= date("d M Y, H:i", strtotime($cita['fecha_cita'])) ?></small><br>
                    <a href="editar_cita.php?id=<?= $cita['id_cita'] ?>" class="btn btn-sm btn-warning mt-2">Editar</a>
                    <a href="eliminar_cita.php?id=<?= $cita['id_cita'] ?>" class="btn btn-sm btn-danger mt-2" onclick="return confirm('¿Cancelar esta cita?')">Cancelar</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center;">No tienes citas asignadas.</p>
        <?php endif; ?>
    </div>

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


<h2 class="mt-5 text-center">Materias que impartes</h2>
    <?php foreach ($cursos as $curso): ?>
        <div class="curso">
            <h3><?= htmlspecialchars($curso['titulo']) ?></h3>
            <a href="<?= htmlspecialchars($curso['link']) ?>" target="_blank">Ver Curso</a>
        </div>
    <?php endforeach; ?>

    <h2 class="mt-5 text-center">Mentorias que has creado</h2>
    <?php foreach ($planes as $plan): ?>
        <div class="curso">
            <h3><?= htmlspecialchars($plan['titulo']) ?></h3>
            <a href="/conectatec/uploads/<?= htmlspecialchars($plan['archivo_pdf']) ?>" target="_blank">Ver Plan PDF</a>
        </div>
    <?php endforeach; ?>

    <h2 class="mt-5 text-center">Reseñas recibidas (Materia)</h2>
    <?php foreach ($resenasCursos as $res): ?>
        <div class="curso">
            <h4><?= htmlspecialchars($res['titulo']) ?></h4>
            <p><?= htmlspecialchars($res['comentario']) ?> (⭐ <?= $res['calificacion'] ?>/5)</p>
        </div>
    <?php endforeach; ?>

    <h2 class="mt-5 text-center">Reseñas recibidas (Mentorias)</h2>
    <?php foreach ($resenasPlanes as $res): ?>
        <div class="curso">
            <h4><?= htmlspecialchars($res['titulo']) ?></h4>
            <p><?= htmlspecialchars($res['comentario']) ?> (⭐ <?= $res['calificacion'] ?>/5)</p>
        </div>
    <?php endforeach; ?>




        </section>

</section>


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





