<form action="{{ route('pacientes.store') }}" method="POST">
    @csrf
    <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
    </div>

    <div>
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>
    </div>

    <div>
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>
    </div>

    <div>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div>
        <label for="data_de_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_de_nascimento" name="data_de_nascimento" required>
    </div>

    <button type="submit">Salvar Paciente</button>
</form>
