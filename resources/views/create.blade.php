<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Agendamento</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center">Criar Agendamento</h2>
        <form id="agendamento-form" action="{{ route('agendamento-submit') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
            <div class="mb-3">
                <label for="date" class="form-label">Data:</label>
                <input type="date" class="form-control" id="date" name="date" required placeholder="YYYY-MM-DD">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Hora:</label>
                <input type="time" class="form-control" id="time" name="time" required placeholder="HH:MM">
            </div>
            <button type="submit" class="btn btn-primary">Criar Agendamento</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
