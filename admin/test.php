<?php
require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;


$options = new Options();
$options->set('defaultFont', 'Helvetica');
$dompdf = new Dompdf($options);


$html = '
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte de Usuarios</title>
  <style>
    body {
      font-family: Helvetica, sans-serif;
      font-size: 12px;
      margin: 20px;
    }
    h1 {
      text-align: center;
      color: #2c3c31;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 25px;
    }
    th, td {
      border: 1px solid #444;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #2c3c31;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    footer {
      text-align: center;
      font-size: 10px;
      margin-top: 50px;
      color: #777;
    }
  </style>
</head>
<body>
  <h1>Reporte de Usuarios Registrados</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre Completo</th>
        <th>Correo Electrónico</th>
        <th>Curso Activo</th>
        <th>Fecha de Registro</th>
      </tr>
    </thead>
    <tbody>';

for ($i = 1; $i <= 25; $i++) {
    $html .= "
      <tr>
        <td>$i</td>
        <td>Usuario $i</td>
        <td>usuario$i@email.com</td>
        <td>Curso #" . (($i % 5) + 1) . "</td>
        <td>" . date('Y-m-d', strtotime("-$i days")) . "</td>
      </tr>";
}

$html .= '
    </tbody>
  </table>
  <footer>
    ConectaTEC - Generado el ' . date('d/m/Y H:i') . '
  </footer>
</body>
</html>
';


$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');


$dompdf->render();
$dompdf->stream("reporte_usuarios.pdf", ["Attachment" => false]);
exit;
