<!-- resources/views/home.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Bem-vindo, {{ Auth::user()->nome }}</h1>

        @if(Auth::user()->role_id == 2)
            <div>
                <ul>
                    <li><a href="/ver-pacientes">Ver Pacientes</a></li>
                    <li><a href="/agenda-medico">Minha Agenda</a></li>
                </ul>
            </div>
        @elseif(Auth::user()->role_id == 1)
            <div>
                <ul>
                    <li><a href="/minhas-consultas">Minhas Consultas</a></li>
                    <li><a href="/agendar-consulta">Agendar Consulta</a></li>
                </ul>
            </div>
        @else
            <div>
                <h2>Opções Gerais</h2>
            </div>
        @endif
    </div>
</x-app-layout>