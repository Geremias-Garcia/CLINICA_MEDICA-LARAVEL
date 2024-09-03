<!-- resources/views/atendimentos.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Próximos atendimentos</h1>

        @if($atendimentos->isEmpty())
            <p>Não há atendimentos pendentes.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Data do Atendimento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($atendimentos as $atendimento)
                        <tr>
                            <td>{{ $atendimento->paciente->user->nome }}</td>
                            <td>{{ \Carbon\Carbon::parse($atendimento->data)->format('d/m/Y') }}</td>
                            <td>
                                <form action="{{ route('atendimentos.create', $atendimento->id) }}" method="GET" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Iniciar Atendimento</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
