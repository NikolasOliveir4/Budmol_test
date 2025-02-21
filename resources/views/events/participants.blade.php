<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscritos no Evento</title>
</head>
<body>
    <h1>Participantes do evento: {{ $event->title }}</h1>

    <a href="{{ route('events.index') }}">← Voltar para eventos</a>

    @if($participants->isEmpty())
        <p>Nenhum participante inscrito ainda.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($participants as $participant)
                    <tr>
                        <td>{{ $participant->user->id }}</td>
                        <td>{{ $participant->user->name }}</td>
                        <td>{{ $participant->user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
