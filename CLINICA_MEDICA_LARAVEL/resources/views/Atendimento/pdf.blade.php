<!-- resources/views/atendimento/pdf.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Atendimento</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .content { margin: 0 15px; }
        .content h2 { margin-bottom: 10px; }
        .content p { margin-bottom: 5px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Atendimento #{{ $atendimento->id }}</h1>
    </div>
    <div class="content">
        <h2>Informações do Paciente</h2>
        <p><strong>Nome:</strong> {{ $atendimento->paciente->user->nome }}</p>
        <p><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($atendimento->paciente->data_de_nascimento)->format('d/m/Y') }}</p>

        <h2>Informações do Médico</h2>
        <p><strong>Nome:</strong> {{ $atendimento->medico->user->nome }}</p>

        <h2>Detalhes do Atendimento</h2>
        <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($atendimento->data)->format('d/m/Y') }}</p>
        <p><strong>Descrição:</strong> {{ $atendimento->descricao }}</p>
    </div>
</body>
</html>
