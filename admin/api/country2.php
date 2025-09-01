<?php
header('Content-Type: application/json'); // siempre JSON

require_once(__DIR__ . '/../models/producto.php');

$country = new Producto();

$method = $_SERVER['REQUEST_METHOD'];

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

$input = json_decode(file_get_contents("php://input"), true);

try {
    switch ($method) {
        case 'GET':
            if ($id) {
                $resultado = $country->leeruno($id);
            } else {
                $resultado = $country->leer();
            }
            echo json_encode(["success" => true, "data" => $resultado]);
            break;

        case 'POST':
            if (!$input || !isset($input['country'])) {
                echo json_encode(["success" => false, "message" => "Falta el campo country"]);
                exit;
            }
            $resultado = $country->crear($input);
            echo json_encode(["success" => $resultado, "message" => $resultado ? "País creado" : "Error al crear"]);
            break;

        case 'PUT':
            if (!$id) {
                echo json_encode(["success" => false, "message" => "Falta ID"]);
                exit;
            }
            if (!$input || !isset($input['country'])) {
                echo json_encode(["success" => false, "message" => "Falta el campo country"]);
                exit;
            }
            $resultado = $country->modificar($input, $id);
            echo json_encode(["success" => $resultado, "message" => $resultado ? "País modificado" : "Error al modificar"]);
            break;

        case 'DELETE':
            if (!$id) {
                echo json_encode(["success" => false, "message" => "Falta ID"]);
                exit;
            }
            $resultado = $country->eliminar($id);
            echo json_encode(["success" => $resultado > 0, "message" => $resultado ? "País eliminado" : "No encontrado"]);
            break;

        default:
            echo json_encode(["success" => false, "message" => "Método no soportado"]);
            break;
    }
} catch (Exception $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
