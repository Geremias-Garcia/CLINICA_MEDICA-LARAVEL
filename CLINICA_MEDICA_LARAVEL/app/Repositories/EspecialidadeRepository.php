<?php

namespace App\Repositories;

use App\Models\Especialidade;

class EspecialidadeRepository extends Repository {

    public function __construct() {
        parent::__construct(new Especialidade());
    }

    public function getAllEspecialidades() {
        return $this->selectAll((object) ["use" => true, "rows" => 10]);
    }
}
