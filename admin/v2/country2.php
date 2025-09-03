<?php
header('Content-Type: application/json'); 

require_once(__DIR__ . '/../models/ModelFactory.php');
require_once(__DIR__.'/./strategy_method.php');

$modelName = isset($_GET['model']) ? $_GET['model'] : null;

if (!$modelName) {
    echo json_encode(["success" => false, "message" => "Falta parámetro 'model' en la URL"]);
    exit;
}

try {
    $model = ModelFactory::create($modelName); 
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$input = json_decode(file_get_contents("php://input"), true);

try {
    switch ($method) {
        case 'GET':
            $context = new CrudContext(new GetStrategy());
            $resultado = $context->execute($model, null, $id);
            break;
        case 'POST':
            $context = new CrudContext(new PostStrategy());
            $resultado = $context->execute($model, $input);
            break;
        case 'PUT':
            $context = new CrudContext(new PutStrategy());
            $resultado = $context->execute($model, $input, $id);
            break;
        case 'DELETE':
            $context = new CrudContext(new DeleteStrategy());
            $resultado = $context->execute($model, null, $id);
            break;
        default:
            throw new Exception("Método no soportado");
    }

    echo json_encode(["success" => true, "data" => $resultado]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
