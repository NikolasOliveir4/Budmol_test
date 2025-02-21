<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function confirmDelete(event) {
            if (!confirm('Tem certeza que deseja excluir este evento?')) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Eventos</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(auth()->user() && auth()->user()->role === 'admin')
            <a href="{{ route('events.create') }}" class="btn btn-primary mb-4">Criar Novo Evento</a>
        @endif

        <ul class="list-group">
            @foreach($events as $event)
                <li class="list-group-item mb-3">
                    <strong>{{ $event->title }}</strong><br>
                    <p>{{ $event->description }}</p>
                    <small>Início: {{ $event->start_at }} | Fim: {{ $event->end_at }} | Localização: {{ $event->location }} | Capacidade: {{ $event->capacity }} | Status: {{ $event->status }}</small><br>

                    @if(auth()->user() && auth()->user()->role === 'admin')
                        <a href="{{ route('events.participants', $event->id) }}" class="btn btn-info btn-sm">Ver Inscritos</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;" onsubmit="confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    @endif

                    @if(auth()->user())
                        @php
                            $isInscribed = $event->inscriptions()->where('user_id', auth()->id())->exists();
                        @endphp

                        @if($event->status == 'open' && !$isInscribed && $event->inscriptions()->count() < $event->capacity)
                            <form action="{{ route('events.inscribe', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Inscrever-se</button>
                            </form>
                        @elseif($isInscribed)
                            <form action="{{ route('events.cancelInscription', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Cancelar Inscrição</button>
                            </form>
                        @elseif(!$isInscribed && $event->inscriptions()->count() >= $event->capacity)
                            <span class="text-danger"><b>Evento Lotado!</b></span>
                        @endif
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
