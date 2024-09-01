<x-app-layout>
    <div class="container">
        <h1>Agendar Consulta</h1>

        <form action="{{ route('agendamentos.store') }}" method="POST">
            @csrf

            <!-- Selecionar médico -->
            <div>
                <label for="medico_id">Médico</label>
                <div id="medico_list" style="max-height: 150px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;">
                    @foreach($medicos as $medico)
                        <div class="medico-item" data-id="{{ $medico->id }}" onclick="selecionarMedico('{{ $medico->id }}')">
                            {{ $medico->user->nome }} <!-- Exibindo o nome do médico -->
                        </div>
                    @endforeach
                </div>
                <input type="hidden" id="medico_id" name="medico_id" required>
            </div>

            <!-- Selecionar data -->
            <div>
                <label for="data">Data</label>
                <input type="date" id="data" name="data" required min="{{ date('Y-m-d') }}">
            </div>

            <!-- Botão de agendar -->
            <button type="submit">Agendar</button>
        </form>
    </div>

    <script>
        function selecionarMedico(medicoId) {
            document.getElementById('medico_id').value = medicoId;

            // Remove a classe 'selecionado' de todos os itens
            const medicos = document.getElementsByClassName('medico-item');
            for (let i = 0; i < medicos.length; i++) {
                medicos[i].classList.remove('selecionado');
            }

            // Adiciona a classe 'selecionado' ao item clicado
            event.target.classList.add('selecionado');
        }
    </script>

    <style>
        .medico-item {
            padding: 5px;
            cursor: pointer;
        }

        .medico-item:hover {
            background-color: #f0f0f0;
        }

        .medico-item.selecionado {
            background-color: #cce5ff;
        }
    </style>
</x-app-layout>
