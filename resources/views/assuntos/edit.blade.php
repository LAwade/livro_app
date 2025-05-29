@extends('layout')
@section('content')
@section('title', 'Editar Assunto - ' . $assunto->descricao)
<h2>Editar Assunto</h2>
<form method="POST" action="{{ route('assuntos.update', $assunto) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Descrição</label>
        <input type="text" name="descricao" class="form-control" value="{{ old('descricao', $assunto->descricao) }}">
    </div>
    <button class="btn btn-primary">Atualizar</button>
</form>
@endsection