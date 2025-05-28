@extends('layout')
@section('content')
<h2>{{ isset($autor) ? 'Editar Autor' : 'Novo Autor' }}</h2>
<form method="POST" action="{{ isset($autor) ? route('autores.update', $autor) : route('autores.store') }}">
    @csrf @if(isset($autor)) @method('PUT') @endif
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome', $autor->nome ?? '') }}">
    </div>
    <button class="btn btn-success">Salvar</button>
</form>
@endsection