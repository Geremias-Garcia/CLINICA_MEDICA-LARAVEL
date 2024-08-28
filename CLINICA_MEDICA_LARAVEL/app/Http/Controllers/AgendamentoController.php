<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Medico;
use App\Models\Especialidade;
use Illuminate\Http\Request;

use App\Repositories\AgendamentoRepository;
use App\Repositories\MedicoRepository;
use App\Repositories\EspecialidadeRepository;

class AgendamentoController extends Controller
{
    protected $agendamentoRepository;
    protected $medicoRepository;
    protected $especialidadeRepository;

    public function __construct(
        AgendamentoRepository $agendamentoRepository,
        MedicoRepository $medicoRepository,
        EspecialidadeRepository $especialidadeRepository
    ) {
        $this->agendamentoRepository = $agendamentoRepository;
        $this->medicoRepository = $medicoRepository;
        $this->especialidadeRepository = $especialidadeRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendamentos = $this->agendamentoRepository->getAll();
        return view('agendamento.index', compact('agendamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especialidades = $this->especialidadeRepository->getAllEspecialidades();
        $medicos = $this->medicoRepository->getAllMedicos();

        return view('Agendamento/Create', compact('especialidades', 'medicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "ok";
    }

    /**
     * Display the specified resource.
     */
    public function show(Agendamento $agendamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agendamento $agendamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agendamento $agendamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agendamento $agendamento)
    {
        //
    }
}
