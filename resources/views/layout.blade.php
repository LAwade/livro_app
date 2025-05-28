<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container">
        <nav class="mb-4">
            <a href="{{ route('livros.index') }}" class="btn btn-primary">Livros</a>
            <a href="{{ route('autores.index') }}" class="btn btn-secondary">Autores</a>
            <a href="{{ route('assuntos.index') }}" class="btn btn-success">Assuntos</a>
            <a href="/relatorio" class="btn btn-info" target="_blank">Relatório</a>
        </nav>
        @yield('content')
    </div>
</body>
</html>