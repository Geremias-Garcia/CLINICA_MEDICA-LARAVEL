<!-- resources/views/agendamentospendentes.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Agendamentos Pendentes</h1>

        @if($agendamentos->isEmpty())
            <p>Não há agendamentos pendentes.</p>
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
                    @foreach($agendamentos as $agendamento)
                        <tr>
                            <td>{{ $agendamento->paciente->user->nome }}</td>
                            <td>{{ \Carbon\Carbon::parse($agendamento->data)->format('d/m/Y') }}</td>
                            <td>
                                <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Aceito">
                                    <button type="submit" class="btn btn-success">Aceitar</button>
                                </form>
                                <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Cancelado">
                                    <button type="submit" class="btn btn-danger">Cancelar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
