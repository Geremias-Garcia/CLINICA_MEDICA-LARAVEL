<div>
    <h1>Listagem de Pacientes</h1>

    @if($data->count())
        <ul>
            @foreach($data as $paciente)
                <li>
                    {{ $paciente->user->nome }}
                    <a href="{{ route('pacientes.edit', $paciente->id) }}">Editar</a>

                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Deseja mesmo excluir o paciente?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>

        {{ $data->links() }}
    @else
        <p>Não há pacientes cadastrados.</p>
    @endif
</div>
