<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
</head>
<body>
    <h1>Editar Evento</h1>
    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Título</label>
        <input type="text" id="title" name="title" value="{{ $event->title }}" required><br>

        <label for="description">Descrição</label>
        <textarea id="description" name="description" required>{{ $event->description }}</textarea><br>

        <label for="start_at">Início</label>
        <input type="datetime-local" id="start_at" name="start_at" value="{{ $event->start_at->format('Y-m-d\TH:i') }}" required><br>

        <label for="end_at">Fim</label>
        <input type="datetime-local" id="end_at" name="end_at" value="{{ $event->end_at->format('Y-m-d\TH:i') }}" required><br>

        <label for="location">Localização</label>
        <input type="text" id="location" name="location" value="{{ $event->location }}" required><br>

        <label for="capacity">Capacidade</label>
        <input type="number" id="capacity" name="capacity" value="{{ $event->capacity }}" required><br>

        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option value="open" {{ $event->status == 'open' ? 'selected' : '' }}>aberto</option>
            <option value="closed" {{ $event->status == 'closed' ? 'selected' : '' }}>fechado</option>
            <option value="cancelled" {{ $event->status == 'cancelled' ? 'selected' : '' }}>cancelado</option>
        </select><br>

        <button type="submit">Atualizar Evento</button>
    </form>
</body>
</html>
