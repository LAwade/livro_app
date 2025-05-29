@extends('layout')
@section('content')
@section('title', 'Editar Livro - ' . $livro->titulo)
<h2>Editar Livro</h2>
<form method="POST" action="{{ route('livros.update', $livro) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $livro->titulo) }}">
    </div>
    <div class="mb-3">
        <label>Data de Publicação</label>
        <input type="date" name="data_publicacao" class="form-control" value="{{ old('data_publicacao', $livro->data_publicacao) }}">
    </div>
    <div class="mb-3">
        <label>Valor</label>
        <input type="number" step="0.01" name="valor" class="form-control" value="{{ old('valor', $livro->valor) }}">
    </div>
    <div class="mb-3">
        <label>Assunto</label>
        <select name="assunto_id" class="form-select">
            @foreach($assuntos as $assunto)
                <option value="{{ $assunto->id }}" {{ $livro->assunto_id == $assunto->id ? 'selected' : '' }}>{{ $assunto->descricao }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Autores</label>
        @foreach($autores as $autor)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="autores[]" value="{{ $autor->id }}"
                {{ $livro->autores->contains($autor->id) ? 'checked' : '' }}>
                <label class="form-check-label">{{ $autor->nome }}</label>
            </div>
        @endforeach
    </div>
    <button class="btn btn-primary">Atualizar</button>
</form>
@endsection