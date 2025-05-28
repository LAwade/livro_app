@extends('layout')
@section('content')
<h2>Autores</h2>
<a href="{{ route('autores.create') }}" class="btn btn-success mb-2">Novo Autor</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($autores as $autor)
        <tr>
            <td>{{ $autor->nome }}</td>
            <td>
                <a href="{{ route('autores.edit', $autor) }}" class="btn btn-warning btn-sm">Editar</a>
                <form method="POST" action="{{ route('autores.destroy', $autor) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir esse autor?')">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection