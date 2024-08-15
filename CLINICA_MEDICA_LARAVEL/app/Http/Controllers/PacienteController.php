<?php

namespace App\Http\Controllers;

use App\Repositories\PacienteRepository;
use App\Repositories\UserRepository;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    protected $pacienteRepository;

    private $rules = [
        'nome' => 'required|min:10|max:255',
        'cpf' => 'required|min:10|max:11|unique:users',
        'endereco' => 'required|string|max:255',
        'telefone' => 'required|string|max:20',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'data_de_nascimento' => 'required|date',
    ];

    public function __construct(PacienteRepository $pacienteRepository)
    {
        $this->pacienteRepository = $pacienteRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->pacienteRepository->getAllPacientes();
        return view('Paciente/read', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Paciente/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate($this->rules);

        $objUser = new User();
        $objUser->nome = mb_strtoupper($request->nome, 'UTF-8');
        $objUser->cpf = $request->cpf;
        $objUser->endereco = $request->endereco;
        $objUser->telefone = $request->telefone;
        $objUser->role_id = 1;
        $objUser->email = $request->email;
        $objUser->password = Hash::make($request->password);
        (new UserRepository())->save($objUser);
        $userId = $objUser->id;

        $obj = new Paciente();
        $obj->user_id = $userId;
        $obj->data_de_nascimento = $request->data_de_nascimento;
        $this->pacienteRepository->save($obj);

        return redirect()->route('pacientes.index')->with('success', 'Paciente criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        return view('Paciente/edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        /*$request->validate($this->rules);

        $paciente->user->nome = mb_strtoupper($request->nome, 'UTF-8');
        $paciente->user->cpf = $request->cpf;
        $paciente->user->endereco = $request->endereco;
        $paciente->user->telefone = $request->telefone;
        $paciente->user->email = $request->email;
        $paciente->user->save();

        $paciente->data_de_nascimento = $request->data_de_nascimento;
        $paciente->save();

        return redirect()->route('pacientes.index')->with('success', 'Paciente atualizado com sucesso!');*/

        return "ok";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
