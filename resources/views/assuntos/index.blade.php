@extends('layout')
@section('content')
<h2>Assuntos</h2>
<a href="{{ route('assuntos.create') }}" class="btn btn-success mb-2">Novo Assunto</a>
<table class="table table-bordered">
    <thead><tr><th>Descrição</th><th>Ações</th></tr></thead>
    <tbody>
    @foreach($assuntos as $assunto)
        <tr>
            <td>{{ $assunto->descricao }}</td>
            <td>
                <a href="{{ route('assuntos.edit', $assunto) }}" class="btn btn-warning btn-sm">Editar</a>
                <form method="POST" action="{{ route('assuntos.destroy', $assunto) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection