<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Página inicial - Livro App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <div class="container py-4">
        <header class="mb-4 text-center">
            <h1 class="display-6 text-primary">📚 Livro App</h1>
            <p class="text-muted">Gerencie seus livros, autores e assuntos com facilidade</p>
        </header>

        <nav class="mb-4 d-flex gap-2 justify-content-center">
            <a href="{{ route('livros.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-book"></i> Livros
            </a>
            <a href="{{ route('autores.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-person-lines-fill"></i> Autores
            </a>
            <a href="{{ route('assuntos.index') }}" class="btn btn-outline-success">
                <i class="bi bi-journal-text"></i> Assuntos
            </a>
            <a href="/relatorio" class="btn btn-outline-info" target="_blank">
                <i class="bi bi-bar-chart-line-fill"></i> Relatório
            </a>
            <a href="https://github.com/LAwade/livro_app" class="btn btn-outline-dark" target="_blank">
                <i class="bi bi-github"></i> Ver no GitHub
            </a>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="mt-5 text-center text-muted">
            <small>&copy; {{ date('Y') }} Livro App - Desenvolvido com PHP/Laravel 12</small>
        </footer>
    </div>
</body>
</html>