<?php

namespace App\Repositories;

use App\Models\Paciente;

class PacienteRepository extends Repository {

    public function __construct() {
        parent::__construct(new Paciente());
    }

    public function getAllPacientes() {
        return $this->selectAll((object) ["use" => true, "rows" => 10]);
    }
}
