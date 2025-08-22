<?php
require_once (__DIR__.'/../vendor5/autoload.php');
require_once(__DIR__.'/models/reporte.php');

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

$web = new Reporte();
if (!$web->checar('Admin')) {
    header('Location: /conectatec/index.php?error=acceso_denegado_not');
    exit;
}


$dsn = 'mysql:host=localhost;dbname=nutrimentor;charset=utf8mb4';
$usuario = 'nutrimentor';
$contrasena = '123';
$pdo = new PDO($dsn, $usuario, $contrasena);


$tablas = ['cliente', 'empleado', 'producto', 'usuario', 'Cursos', 'plan_nutricional', 'transaccion', 'resena_producto'];

$spreadsheet = new Spreadsheet();

foreach ($tablas as $index => $tabla) {
    $sheet = $index === 0 ? $spreadsheet->getActiveSheet() : $spreadsheet->createSheet();
    $sheet->setTitle(substr($tabla, 0, 31)); // Excel limita a 31 caracteres

    $stmt = $pdo->query("SELECT * FROM $tabla");
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($datos)) {
        $colIndex = 1;
        $columns = array_keys($datos[0]);

       
        foreach ($columns as $i => $col) {
            $cellCoordinate = Coordinate::stringFromColumnIndex($i + 1) . '1';
            $sheet->setCellValue($cellCoordinate, strtoupper($col));
        }
        
     
        $headerRange = $sheet->getStyle('A1:' . Coordinate::stringFromColumnIndex(count($columns)) . '1');
        $headerRange->getFont()->setBold(true)->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color('FFFFFF'));
        $headerRange->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('4F81BD');
        $headerRange->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        
 
        $rowNum = 2;
        foreach ($datos as $fila) {
            foreach (array_values($fila) as $i => $valor) {
                $cellCoordinate = Coordinate::stringFromColumnIndex($i + 1) . $rowNum;
                $sheet->setCellValue($cellCoordinate, $valor);
            }
            $rowNum++;
        }


        
            for ($i = 1; $i <= count($columns); $i++) {
                $sheet->getColumnDimensionByColumn($i)->setAutoSize(true);
            }

            $lastRow = $rowNum - 1;
            $startCell = 'A1';
            $endCell = Coordinate::stringFromColumnIndex(count($columns)) . $lastRow;
            $borderRange = $sheet->getStyle("$startCell:$endCell");
            $borderRange->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);



    }
}


$writer = new Xlsx($spreadsheet);
ob_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="nutrimentor_exportado.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit;
?>
