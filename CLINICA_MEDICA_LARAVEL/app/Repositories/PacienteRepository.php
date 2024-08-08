<?php

namespace App\Repositories;

use App\Models\Paciente;

class PacienteRepository extends Repository {

    protected $repository;

    public function __construct() {
        $this->repository = new PacienteRepository();
    }

    public function index() {
        $data = $this->repository->selectAll((object) ["use" => true, "rows" => 10]);

        return view('patient.index', compact('data'));
    }
}
