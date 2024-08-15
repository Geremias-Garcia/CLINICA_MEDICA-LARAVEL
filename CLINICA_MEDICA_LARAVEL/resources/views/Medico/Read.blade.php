<div>
    <h1>Listagem de Medicos</h1>

    @if($data->count())
        <ul>
            @foreach($data as $medico)
                <li>{{ $medico->user->nome }}</li>
            @endforeach
        </ul>

        {{ $data->links() }}
    @else
        <p>Não há pacientes cadastrados.</p>
    @endif
</div>
