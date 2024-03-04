<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-center">Agendamentos</span>
            <div class="d-flex align-items-center">
                <span class="me-2 text-white">Bem-vindo, {{ Auth::user()->name }}</span>
                <a href="{{ route('create') }}" class="btn btn-primary me-2">Novo Agendamento</a>
                <a href="{{route('profile') }}" class="btn btn-success me-2">Ver Perfil</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        <h2>Lista de Agendamentos</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendamentos as $agendamento)
                <tr>
                    <td>{{ $agendamento->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($agendamento->date)->format('d/m/Y') }}</td>
                    <td>{{ $agendamento->time }}</td>
                    <td>
                        <div class="d-inline">
                            <a href="{{ route('edit', ['id' => $agendamento->id]) }}" class="btn btn-info btn-sm">Editar</a>
                            <form action="{{ route('delete', ['id' => $agendamento->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este agendamento?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
