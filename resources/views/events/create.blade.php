<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Criar Novo Evento</h1>

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="start_at" class="form-label">Início</label>
                <input type="datetime-local" id="start_at" name="start_at" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="end_at" class="form-label">Fim</label>
                <input type="datetime-local" id="end_at" name="end_at" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Localização</label>
                <input type="text" id="location" name="location" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="capacity" class="form-label">Capacidade</label>
                <input type="number" id="capacity" name="capacity" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select" required>
                    <option value="open">Aberto</option>
                    <option value="closed">Fechado</option>
                    <option value="cancelled">Cancelado</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Criar Evento</button>
        </form>
    </div>
</body>
</html>
