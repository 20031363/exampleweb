<?php 
require_once(__DIR__.'/model.php');
require_once(__DIR__ . '/config.php');
$app = new Model();

if(!($app->checar('Nutricionista') || $app->checar('Coach') || $app->checar('Doctor') )) {
    header('Location: /conectatec/index.php'); 
    exit; 
}

session_start();

$model = new Model();
$model->conectar();
$pdo = $model->conexion;

if (!isset($_GET['id'])) {
    die("Cita no especificada.");
}

$id_cita = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM cita WHERE id_cita = ?");
$stmt->execute([$id_cita]);
$cita = $stmt->fetch();

if (!$cita) {
    die("Cita no encontrada.");
}

$stmt = $pdo->query("SELECT * FROM lugar");
$lugares = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha_cita'];
    $id_lugar = $_POST['id_lugar'];

    $stmt = $pdo->prepare("UPDATE cita SET titulo = ?, descripcion = ?, fecha_cita = ?, id_lugar = ? WHERE id_cita = ?");
    $stmt->execute([$titulo, $descripcion, $fecha, $id_lugar, $id_cita]);

    header("Location: panel.php?msg=cita_actualizada");
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cita</title>
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
    </style>
</head>
<body>

<div class="form-container">
    <h2>Editar Cita</h2>
    <form method="POST">
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($cita['titulo']) ?>" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion"><?= htmlspecialchars($cita['descripcion']) ?></textarea>
        </div>

        <div class="form-group">
            <label for="fecha_cita">Fecha y hora:</label>
            <input type="datetime-local" name="fecha_cita" id="fecha_cita" value="<?= date('Y-m-d\TH:i', strtotime($cita['fecha_cita'])) ?>" min="<?= date('Y-m-d\TH:i', strtotime('+0 day')) ?>" required>
        </div>

        <div class="form-group">
            <label for="id_lugar">Lugar:</label>
            <select name="id_lugar" id="id_lugar">
                <?php foreach ($lugares as $l): ?>
                    <option value="<?= $l['id_lugar'] ?>" <?= $l['id_lugar'] == $cita['id_lugar'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($l['lugar']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit">Actualizar Cita</button>
        </div>
    </form>
</div>

</body>
</html>



