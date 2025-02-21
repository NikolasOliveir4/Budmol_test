<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <script>
        function confirmDelete(event) {
            if (!confirm('Tem certeza que deseja excluir este evento?')) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <h1>Eventos</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if(auth()->user() && auth()->user()->role === 'admin')
        <a href="{{ route('events.create') }}">Criar Novo Evento</a>
    @endif

    <ul>
        @foreach($events as $event)
            <li>
                <strong>{{ $event->title }}</strong><br>
                {{ $event->description }}<br>
                Início: {{ $event->start_at }}<br>
                Fim: {{ $event->end_at }}<br>
                Localização: {{ $event->location }}<br>
                Capacidade: {{ $event->capacity }}<br>
                Status: {{ $event->status }}<br>

                <!-- Mostrar botões de editar e excluir apenas para administradores -->
                @if(auth()->user() && auth()->user()->role === 'admin')
                    <a href="{{ route('events.edit', $event->id) }}">Editar</a>

                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;" onsubmit="confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                @endif

                <!-- Botões de inscrição e cancelamento -->
                @if(auth()->user())
                    @php
                        $isInscribed = $event->inscriptions()->where('user_id', auth()->id())->exists();
                    @endphp

                    @if($event->status == 'open' && !$isInscribed)
                        <!-- Botão de Inscrição -->
                        <form action="{{ route('events.inscribe', $event->id) }}" method="POST">
                            @csrf
                            <button type="submit">Inscrever-se</button>
                        </form>
                    @elseif($isInscribed)
                        <!-- Botão de Cancelamento de Inscrição -->
                        <form action="{{ route('events.cancelInscription', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Cancelar Inscrição</button>
                        </form>
                    @endif
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>
