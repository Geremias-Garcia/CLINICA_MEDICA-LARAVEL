<?php

namespace App\Http\Controllers;

use App\Repositories\PacienteRepository;
use App\Repositories\UserRepository;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PacienteController extends Controller
{
    protected $pacienteRepository;

    private $rules = [
        'nome' => 'required|min:10|max:255',
        'cpf' => 'required|min:11|max:11|unique:users,cpf,',
        'endereco' => 'required|string|max:255',
        'telefone' => 'required|string|max:20',
        'email' => 'required|string|email|max:255|unique:users,email,',
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
        try {
            $user = $paciente->user;

            $validator = Validator::make($request->all(), [
                'nome' => 'required|min:10|max:255',
                'cpf' => [
                    'required',
                    'min:11',
                    'max:11',
                    Rule::unique('users', 'cpf')->ignore($user->id),
                ],
                'endereco' => 'required|string|max:255',
                'telefone' => 'required|string|max:20',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore($user->id),
                ],
                'data_de_nascimento' => 'required|date',
            ], [
                'nome.required' => 'O campo nome é obrigatório.',
                'nome.min' => 'O nome deve ter pelo menos 10 caracteres.',
                'cpf.required' => 'O campo CPF é obrigatório.',
                'cpf.min' => 'O CPF deve ter 11 dígitos.',
                'cpf.max' => 'O CPF deve ter no máximo 11 dígitos.',
                'endereco.required' => 'O campo endereço é obrigatório.',
                'telefone.required' => 'O campo telefone é obrigatório.',
                'email.required' => 'O campo email é obrigatório.',
                'email.email' => 'O campo email deve ser um endereço de email válido.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user->nome = mb_strtoupper($request->nome, 'UTF-8');
            $user->cpf = $request->cpf;
            $user->endereco = $request->endereco;
            $user->telefone = $request->telefone;
            $user->email = $request->email;
            if ($request->has('password') && !empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
            (new UserRepository())->save($user);

            $paciente->data_de_nascimento = $request->data_de_nascimento;
            $this->pacienteRepository->save($paciente);

            return redirect()->route('pacientes.index')->with('success', 'Paciente atualizado com sucesso!');
        } catch (\Exception $e) {
            \Log::error('Erro ao atualizar paciente: '.$e->getMessage());
            return back()->withErrors(['error' => 'Ocorreu um erro ao tentar atualizar o paciente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $userId = $paciente->user->id;
        return $this->pacienteRepository->findById($userId);

        if($this->repository->delete($id))  {
            return redirect()->route('aluno.index');;
        }


    }
}

