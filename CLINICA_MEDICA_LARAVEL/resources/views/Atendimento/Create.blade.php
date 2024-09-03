<!-- resources/views/atendimento/iniciar.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Iniciar Atendimento</h1>

        <div class="card">
            <div class="card-header">
                Dados do Paciente
            </div>
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $atendimento->paciente->user->nome }}</p>
                <p><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($atendimento->paciente->data_de_nascimento)->format('d/m/Y') }}</p>
                <p><strong>Data do Atendimento:</strong> {{ \Carbon\Carbon::parse($atendimento->data)->format('d/m/Y') }}</p>
                <!-- Adicione outros dados do paciente conforme necessário -->
            </div>
        </div>

        <!-- Formulário para o atendimento -->
        <form action="{{ route('atendimentos.store') }}" method="POST">
            @csrf

            <!-- Campo de texto para diagnóstico e outras informações -->
            <div class="form-group">
                <label for="diagnostico">Diagnóstico e Observações:</label>
                <textarea name="descricao" id="diagnostico" class="form-control" rows="5" placeholder="Insira o diagnóstico, observações ou outras informações relevantes aqui..."></textarea>
            </div>

            <!-- Campo oculto para enviar o ID do agendamento -->
            <input type="hidden" name="paciente_id" value="{{ $atendimento->paciente->id }}">
            <input type="hidden" name="medico_id" value="{{ $atendimento->medico_id }}">
            <input type="hidden" name="data" value="{{ $atendimento->data }}">

            <!-- Botão para finalizar o atendimento -->
            <button type="submit" class="btn btn-success mt-3">Finalizar Atendimento</button>
        </form>
    </div>
</x-app-layout>
