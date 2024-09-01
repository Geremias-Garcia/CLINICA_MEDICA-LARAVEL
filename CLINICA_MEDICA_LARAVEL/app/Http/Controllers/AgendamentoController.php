<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Medico;
use App\Models\User;
use App\Models\Especialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Repositories\AgendamentoRepository;
use App\Repositories\AtendimentoRepository;
use App\Repositories\MedicoRepository;
use App\Repositories\EspecialidadeRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AgendamentoController extends Controller
{
    private $rules = [
        'medico_id' => 'required',
        'data' => 'required',
        'paciente_id' => 'required',
    ];

    use AuthorizesRequests;

    protected $agendamentoRepository;
    protected $medicoRepository;
    protected $especialidadeRepository;
    protected $atendimentoRepository;

    public function __construct(
        AgendamentoRepository $agendamentoRepository,
        MedicoRepository $medicoRepository,
        EspecialidadeRepository $especialidadeRepository,
        AtendimentoRepository $atendimentoRepository
    ) {
        $this->agendamentoRepository = $agendamentoRepository;
        $this->medicoRepository = $medicoRepository;
        $this->especialidadeRepository = $especialidadeRepository;
        $this->atendimentoRepository = $atendimentoRepository;
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
        $pacienteId = Auth::user()->paciente->id;

        $objAgendamento = new Agendamento();
        $objAgendamento->paciente_id = $pacienteId;
        $objAgendamento->medico_id = $request->medico_id;
        $objAgendamento->data = $request->data;
        $objAgendamento->status = "Em aberto";

        (new AgendamentoRepository())->save($objAgendamento);

        return redirect()->route('home')->with('success', 'Consulta agendada com sucesso!');
    }

    public function agendamentosPendentes()
    {
        $medicoId = Auth::user()->medico->id;

        // Recupera os agendamentos que estão "em aberto" para o médico logado
        $agendamentos = Agendamento::where('medico_id', $medicoId)
            ->where('status', 'Em aberto')
            ->with('paciente.user') // Carrega o paciente e suas informações de usuário
            ->get();


        return view('Medico/AgendamentosPendentes', compact('agendamentos'));
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
        $request->validate([
            'status' => 'required|in:Aceito,Cancelado',
        ]);

        // Atualiza o status do agendamento
        $agendamento->status = $request->status;
        $agendamento->save();

        // Redireciona para a rota de agendamentos pendentes com uma mensagem de sucesso
        return redirect()->route('AgendamentosPendentes')->with('success', 'Status do agendamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agendamento $agendamento)
    {
        //
    }
}
