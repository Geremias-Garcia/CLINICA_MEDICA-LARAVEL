<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Medico;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Especialidade;
use App\Models\Atendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Repositories\AgendamentoRepository;
//use App\Repositories\AtendimentoRepository;
use App\Repositories\MedicoRepository;
use App\Repositories\EspecialidadeRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AtendimentoController extends Controller
{
    use AuthorizesRequests;

    protected $agendamentoRepository;
    protected $medicoRepository;
    protected $especialidadeRepository;
    //protected $atendimentoRepository;

    public function __construct(
        AgendamentoRepository $agendamentoRepository,
        MedicoRepository $medicoRepository,
        EspecialidadeRepository $especialidadeRepository,
        //AtendimentoRepository $atendimentoRepository
    ) {
        $this->agendamentoRepository = $agendamentoRepository;
        $this->medicoRepository = $medicoRepository;
        $this->especialidadeRepository = $especialidadeRepository;
        //$this->atendimentoRepository = $atendimentoRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function verProximos()
    {
        //$this->authorize('verificar', Agendamento::class);

        $medicoId = Auth::user()->medico->id;

        // Recupera os agendamentos que estão "em aberto" para o médico logado
        $atendimentos = Agendamento::where('medico_id', $medicoId)
            ->where('status', 'Aceito')
            ->with('paciente.user')
            ->get();


        return view('Atendimento/Home', compact('atendimentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $atendimento = Agendamento::with('paciente.user')->findOrFail($id);

        $agendamento = Agendamento::findOrFail($id);
        $agendamento->status = 'Finalizado';
        $agendamento->save();

        // Aqui você pode adicionar a lógica que desejar para iniciar o atendimento

        return view('Atendimento/Create', compact('atendimento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());

        $validated = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'data' => 'required|date',
            'descricao' => 'required|string|max:255',
        ]);

        // Criação do novo atendimento
        Atendimento::create([
            'paciente_id' => $validated['paciente_id'],
            'medico_id' => $validated['medico_id'],
            'data' => $validated['data'],
            'descricao' => $validated['descricao'],
        ]);

        // Redirecionar para a página desejada com uma mensagem de sucesso
        return redirect()->route('home')->with('success', 'Atendimento finalizado com sucesso!');
    }

    public function minhasConsultas()
    {
        // Obter o ID do usuário logado
        $userId = Auth::user()->id;

        // Buscar o paciente correspondente ao usuário logado
        $paciente = Paciente::where('user_id', $userId)->first();

        // Verificar se o paciente foi encontrado
        if ($paciente) {
            // Buscar todos os atendimentos onde o paciente_id é igual ao ID do paciente
            $atendimentos = Atendimento::where('paciente_id', $paciente->id)->get();

            // Retornar a view com os atendimentos do paciente
            return view('Atendimento/MinhasConsultas', compact('atendimentos'));
        } else {
            // Caso o paciente não seja encontrado, redirecionar para uma página de erro ou mostrar uma mensagem apropriada
            return redirect()->route('home')->with('error', 'Paciente não encontrado.');
        }
    }


    public function gerarPdf($id)
    {
        // Buscar o atendimento pelo ID com as relações necessárias
        $atendimento = Atendimento::with('paciente.user', 'medico.user')->findOrFail($id);

        // Carregar a view e passar os dados do atendimento
        $pdf = Pdf::loadView('atendimento.pdf', compact('atendimento'));

        // Retornar o PDF para o usuário fazer o download ou visualizar
        return $pdf->download('atendimento_' . $atendimento->id . '.pdf');
    }
    /**
     * Display the specified resource.
     */
    public function show(Atendimento $atendimento)
    {
        return "ok";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atendimento $atendimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atendimento $atendimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atendimento $atendimento)
    {
        //
    }
}
