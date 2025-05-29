@extends('layout')
@section('content')
@section('title', 'Lista dos Livros')
<h1>Livros</h1>
<a href="{{ route('livros.create') }}" class="btn btn-sm btn-success mb-3">Novo Livro</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Título</th>
            <th>Data</th>
            <th>Valor</th>
            <th>Assunto</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($livros as $livro)
        <tr>
            <td>{{ $livro->titulo }}</td>
            <td>{{ \Carbon\Carbon::parse($livro->data_publicacao)->format('d/m/Y') }}</td>
            <td>R$ {{ number_format($livro->valor, 2, ',', '.') }}</td>
            <td>{{ $livro->assunto->descricao }}</td>
            <td>
                <a href="{{ route('livros.edit', $livro) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('livros.destroy', $livro) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Deseja realmente excluir o livro {{ $livro->titulo }}?')" class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection