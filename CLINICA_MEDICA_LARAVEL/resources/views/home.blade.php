<!-- resources/views/home.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Bem-vindo, {{ Auth::user()->nome }}</h1>

        @can('isMedico', App\Models\Role::class)
            <div>
                <br>
                <ul>
                    <li><a href="/ver-pacientes">Ver Pacientes</a></li>
                    <li><a href="{{ route('AgendamentosPendentes') }}">Agendamentos pendentes</a></li>
                </ul>
            </div>
        @endcan

        @can('isPaciente', App\Models\Role::class)
            <div>
                <br>
                <ul>
                    <li><a href="/minhas-consultas">Minhas Consultas</a></li>
                    <li><a href="{{ route('agendamentos.create') }}">Agendar Consulta</a></li>
                </ul>
            </div>
        @endcan
    </div>
</x-app-layout>
