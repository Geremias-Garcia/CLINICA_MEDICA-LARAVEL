<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;

class Repository {

    protected $model;

    public function __construct(object $model) {
        $this->model = $model;
    }

    public function selectAll(object $paginate) {
        if($paginate->use) {
            return $this->model->paginate($paginate->rows);
        }

        return $this->model->all();
    }

    public function findById($id) {
        return $this->model->find($id);
    }

    public function save($obj) {

        try {
            $obj->save();
            return true;
        } catch(Exception $e) { dd($e); }

        return false;
    }

    public function delete($id) {

        $obj = $this->findById($id);
        if(isset($obj)) {
            try {
                $obj->delete();
                return true;
            } catch(Exception $e) { dd($e); }
        }
        return false;
    }

}
