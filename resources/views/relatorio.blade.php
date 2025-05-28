<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Livros por Autor</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .autor { margin-top: 20px; }
        .livro { margin-left: 15px; }
    </style>
</head>
<body>
    <h1>Relatório de Livros por Autor</h1>
    @foreach($dados as $autor => $livros)
        <div class="autor">
            <strong>{{ $autor }}</strong>
            @foreach($livros as $livro)
                <div class="livro">
                    <p><strong>{{ $livro->titulo }}</strong> ({{ $livro->data_publicacao }}) - R$ {{ number_format($livro->valor, 2, ',', '.') }}<br>
                    Assunto: {{ $livro->assunto }}</p>
                </div>
            @endforeach
        </div>
    @endforeach
</body>
</html>