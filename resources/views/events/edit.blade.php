<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <!-- Incluindo Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Evento</h1>

        <!-- Alerta de Sucesso -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulário de Edição -->
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Título -->
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
            </div>

            <!-- Descrição -->
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" required>{{ $event->description }}</textarea>
            </div>

            <!-- Início -->
            <div class="mb-3">
                <label for="start_at" class="form-label">Início</label>
                <input type="datetime-local" class="form-control" id="start_at" name="start_at" value="{{ $event->start_at->format('Y-m-d\TH:i') }}" required>
            </div>

            <!-- Fim -->
            <div class="mb-3">
                <label for="end_at" class="form-label">Fim</label>
                <input type="datetime-local" class="form-control" id="end_at" name="end_at" value="{{ $event->end_at->format('Y-m-d\TH:i') }}" required>
            </div>

            <!-- Localização -->
            <div class="mb-3">
                <label for="location" class="form-label">Localização</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}" required>
            </div>

            <!-- Capacidade -->
            <div class="mb-3">
                <label for="capacity" class="form-label">Capacidade</label>
                <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $event->capacity }}" required>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="open" {{ $event->status == 'open' ? 'selected' : '' }}>Aberto</option>
                    <option value="closed" {{ $event->status == 'closed' ? 'selected' : '' }}>Fechado</option>
                    <option value="cancelled" {{ $event->status == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                </select>
            </div>

            <!-- Botão de Atualizar -->
            <button type="submit" class="btn btn-warning">Atualizar Evento</button>
            <a href="{{ route('events.index') }}" class="btn btn-secondary ms-3">Cancelar</a>
        </form>
    </div>

    <!-- Incluindo o JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
