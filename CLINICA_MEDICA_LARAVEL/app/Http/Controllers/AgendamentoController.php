<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Medico;
use App\Models\User;
use App\Models\Especialidade;
use Illuminate\Http\Request;

use App\Repositories\AgendamentoRepository;
use App\Repositories\MedicoRepository;
use App\Repositories\EspecialidadeRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AgendamentoController extends Controller
{
    private $rules = [
        'medico_id' => 'required|exists:medicos,id',
        'data' => 'required|date|after_or_equal:today',
        'paciente_id' => 'required|exists:pacientes,id',
    ];

    use AuthorizesRequests;

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
        $this->authorize('agendarConsultaPermission', Agendamento::class);

        $medicos = Medico::with('user')->get(); // Filtra usuários com o papel de médico

        return view('Agendamento/Create', compact('medicos'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $objAgendamento = new Agendamento();
        $objAgendamento->paciente_id = auth()->user()->id;
        $objAgendamento->medico_id = $request->medico_id;
        $objAgendamento->data = $request->data;
        $objAgendamento->status = "Em aberto";

        (new AgendamentoRepository())->save($objAgendamento);

        return redirect()->route('home')->with('success', 'Consulta agendada com sucesso!');
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
