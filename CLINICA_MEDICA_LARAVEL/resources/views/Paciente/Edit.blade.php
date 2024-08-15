<form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="{{ $paciente->user->nome }}" required>
    </div>

    <div>
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="{{ $paciente->user->cpf }}" required>
    </div>

    <div>
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" value ="{{ $paciente->user->endereco }}" required>
    </div>

    <div>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value ="{{ $paciente->user->telefone }}" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value ="{{ $paciente->user->email }}" required>
    </div>

    <div>
        <label for="data_de_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_de_nascimento" name="data_de_nascimento" value ="{{ $paciente->data_de_nascimento }}" required>
    </div>

    <!-- Repita os demais campos de acordo com os campos necessários -->

    <button type="submit">Atualizar Paciente</button>
</form>
