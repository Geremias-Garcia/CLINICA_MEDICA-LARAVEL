<!-- resources/views/atendimentos/minhas-consultas.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Meus Atendimentos</h1>

        @if($atendimentos->isEmpty())
            <p>Você ainda não tem atendimentos realizados.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Data do Atendimento</th>
                        <th>Nome do Médico</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($atendimentos as $atendimento)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($atendimento->data)->format('d/m/Y') }}</td>
                            <td>{{ $atendimento->medico->user->nome }}</td> <!-- Supondo que há uma relação médico -> usuário -->
                            <td>{{ $atendimento->descricao }}</td>
                            <td>
                                <!-- Adicione ações relevantes, como ver detalhes ou excluir atendimento -->
                                <a href="{{ route('atendimentos.show', $atendimento->id) }}" class="btn btn-info">Ver Detalhes</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
