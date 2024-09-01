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
                        <th>Data do Agendamento</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agendamentos as $agendamento)
                        <tr>
                            <td>{{ $agendamento->paciente->user->nome }}</td>
                            <td>{{ \Carbon\Carbon::parse($agendamento->data)->format('d/m/Y') }}</td>
                            <td>{{ $agendamento->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
