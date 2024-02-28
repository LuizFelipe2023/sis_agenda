<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci Minha Senha</title>
    <!-- Adicione o link para o estilo CSS do Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Esqueci Minha Senha</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('reset-password') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">E-Mail</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Enviar Link de Redefinição de Senha</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Adicione o script JavaScript do Bootstrap 5 (opcional, se precisar de funcionalidades específicas do Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
