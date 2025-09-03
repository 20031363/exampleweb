<?php 

interface CrudStrategy {
    public function execute($model, $input = null, $id = null);
}

class GetStrategy implements CrudStrategy {
    public function execute($model, $input = null, $id = null) {
        return $id ? $model->leeruno($id) : $model->leer();
    }
}

class PostStrategy implements CrudStrategy {
    public function execute($model, $input = null, $id = null) {
        if (!$input || !(isset($input['country']) || isset($input['first_name']) || isset($input['last_name']))) {
            throw new Exception("Falta el campo country");
        }
        return $model->crear($input);
    }
}

class PutStrategy implements CrudStrategy {
    public function execute($model, $input = null, $id = null) {
        if (!$id) throw new Exception("Falta ID");
        if (!$input || !(isset($input['country']) || isset($input['first_name']) || isset($input['last_name']))) throw new Exception("Falta el campo country");
        return $model->modificar($input, $id);
    }
}

class DeleteStrategy implements CrudStrategy {
    public function execute($model, $input = null, $id = null) {
        if (!$id) throw new Exception("Falta ID");
        return $model->eliminar($id);
    }
}

class CrudContext {
    private CrudStrategy $strategy;

    public function __construct(CrudStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function execute($model, $input = null, $id = null) {
        return $this->strategy->execute($model, $input, $id);
    }
}


?>