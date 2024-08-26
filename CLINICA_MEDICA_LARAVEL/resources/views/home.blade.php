<!-- resources/views/home.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Bem-vindo, {{ Auth::user()->nome }}</h1>

        @if(Auth::user()->role_id == 2)
            <div>
                <ul>
                    <li><a href="/ver-pacientes">Ver Pacientes</a></li>
                    <li><a href="/agenda-medico">Minha Agenda</a></li>
                    <!-- Adicione outras opções específicas para médicos aqui -->
                </ul>
            </div>
        @elseif(Auth::user()->role_id == 1)
            <!-- Mostrar opções específicas para pacientes -->
            <div>
                <ul>
                    <li><a href="/minhas-consultas">Minhas Consultas</a></li>
                    <li><a href="/agendar-consulta">Agendar Consulta</a></li>
                    <!-- Adicione outras opções específicas para pacientes aqui -->
                </ul>
            </div>
        @else
            <!-- Mostrar opções padrão ou para outras roles -->
            <div>
                <h2>Opções Gerais</h2>
                <!-- Adicione opções padrão aqui -->
            </div>
        @endif
    </div>
</x-app-layout>
