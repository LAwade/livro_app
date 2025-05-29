@extends('layout')
@section('content')
@section('title', 'Cadastro de Assuntos')
<h2>{{ isset($assunto) ? 'Editar Assunto' : 'Novo Assunto' }}</h2>
<form method="POST" action="{{ isset($assunto) ? route('assuntos.update', $assunto) : route('assuntos.store') }}">
    @csrf @if(isset($assunto)) @method('PUT') @endif
    <div class="mb-3">
        <label>Descrição</label>
        <input type="text" name="descricao" class="form-control" value="{{ old('descricao', $assunto->descricao ?? '') }}">
    </div>
    <button class="btn btn-success">Salvar</button>
</form>
@endsection