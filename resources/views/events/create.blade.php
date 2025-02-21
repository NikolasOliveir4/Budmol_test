<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Evento</title>
</head>
<body>
    <h1>Criar Novo Evento</h1>
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <label for="title">Título</label>
        <input type="text" id="title" name="title" required><br>
        
        <label for="description">Descrição</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="start_at">Início</label>
        <input type="datetime-local" id="start_at" name="start_at" required><br>

        <label for="end_at">Fim</label>
        <input type="datetime-local" id="end_at" name="end_at" required><br>

        <label for="location">Localização</label>
        <input type="text" id="location" name="location" required><br>

        <label for="capacity">Capacidade</label>
        <input type="number" id="capacity" name="capacity" required><br>

        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option value="open">aberto</option>
            <option value="closed">fechado</option>
            <option value="cancelled">cancelado</option>
        </select><br>

        <button type="submit">Criar Evento</button>
    </form>
</body>
</html>
