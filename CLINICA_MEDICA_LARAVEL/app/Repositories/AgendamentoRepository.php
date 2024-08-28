<?php

namespace App\Repositories;

use App\Models\Agendamento;

class AgendamentoRepository extends Repository {

    public function __construct() {
        parent::__construct(new Agendamento());
    }

    public function getAllAgendamentos() {
        return $this->selectAll((object) ["use" => true, "rows" => 10]);
    }
}
