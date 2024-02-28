<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-center">Editar Agendamento</span>
        </div>
    </header>

    <div class="container mt-4">
        <form id="edit-form" action="{{ route('edit-submit', $agendamento->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">Nova Data:</label>
                <input type="date" class="form-control" id="date" name="date" required placeholder="YYYY-MM-DD">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Novo Hora:</label>
                <input type="time" class="form-control" id="time" name="time" required placeholder="HH:MM">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Agendamento</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>