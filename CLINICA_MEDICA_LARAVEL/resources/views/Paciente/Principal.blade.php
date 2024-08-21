<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Médica</title>
</head>
<body>
    <h1>Bem-vindo à Clínica Médica</h1>

    <div>
        <button onclick="window.location='{{ route('pacientes.create') }}'">Cadastrar Paciente</button>
        <button onclick="window.location='{{ route('pacientes.index') }}'">Listar Pacientes</button>
    </div>
</body>
</html>
