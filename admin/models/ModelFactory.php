<?php
// models/ModelFactory.php
require_once(__DIR__ . '/producto.php');
require_once(__DIR__ . '/marca.php');
// require_once(__DIR__ . '/categoria.php');

class ModelFactory {
    public static function create($modelName) {
        switch (strtolower($modelName)) {
            case 'producto':
                return new Producto();
            case 'marca':
                return new Marca();
            // case 'categoria':
            //     return new Categoria();
            default:
                throw new Exception("Modelo no soportado: " . $modelName);
        }
    }
}
