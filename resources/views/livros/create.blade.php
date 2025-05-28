@extends('layout')
@section('content')
<h2>Novo Livro</h2>
<form method="POST" action="{{ route('livros.store') }}">
    @csrf
    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control">
    </div>
    <div class="mb-3">
        <label>Data de Publicação</label>
        <input type="date" name="data_publicacao" class="form-control">
    </div>
    <div class="mb-3">
        <label>Valor</label>
        <input type="number" step="0.01" name="valor" class="form-control">
    </div>
    <div class="mb-3">
        <label>Assunto</label>
        <select name="assunto_id" class="form-select">
            @foreach($assuntos as $assunto)
                <option value="{{ $assunto->id }}">{{ $assunto->descricao }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Autores</label>
        @foreach($autores as $autor)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="autores[]" value="{{ $autor->id }}">
                <label class="form-check-label">{{ $autor->nome }}</label>
            </div>
        @endforeach
    </div>
    <button class="btn btn-success">Salvar</button>
</form>
@endsection