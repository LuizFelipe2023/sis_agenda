<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-center">Perfil</span>
            <div class="d-flex">
                <a href="{{ route('dashboard') }}" class="btn btn-primary me-2">Dashboard</a>
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        <h2>Dados do Perfil</h2>
        <div class="card">
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $user->name }}</p>
                <p><strong>E-mail:</strong> {{ $user->email }}</p>
                <p><strong>Telefone:</strong> {{ $user->phone }}</p>
                <p><strong>Papel:</strong> {{ $user->role }}</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>