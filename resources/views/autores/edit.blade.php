@extends('layout')
@section('content')
@section('title', 'Edição Autor - ' . $autor->nome)
<h2>Editar Autor</h2>
<form method="POST" action="{{ route('autores.update', $autor) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome', $autor->nome) }}">
    </div>
    <button class="btn btn-primary">Atualizar</button>
</form>
@endsection