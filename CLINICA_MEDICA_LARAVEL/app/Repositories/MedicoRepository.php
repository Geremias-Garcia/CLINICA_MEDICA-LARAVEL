<?php

namespace App\Repositories;

use App\Models\Medico;

class MedicoRepository extends Repository {

    public function __construct() {
        parent::__construct(new Medico());
    }

    public function getAllMedicos() {
        return $this->selectAll((object) ["use" => true, "rows" => 10]);
    }

}
