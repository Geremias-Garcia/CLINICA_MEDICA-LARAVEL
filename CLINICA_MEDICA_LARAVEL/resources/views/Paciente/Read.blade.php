<div>
    <h1>Listagem de Pacientes</h1>

    @if($data->count())
        <ul>
            @foreach($data as $paciente)
                <li>{{ $paciente->user->nome }}</li> <!-- Ajuste o campo conforme o modelo 'Paciente' -->
            @endforeach
        </ul>

        {{ $data->links() }}
    @else
        <p>Não há pacientes cadastrados.</p>
    @endif
</div>
