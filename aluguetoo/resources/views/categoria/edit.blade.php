@extends('site.layout')

@section('conteudo')
<main class="dashboard-container">
<h1>Editar Categoria</h1>

<form action="{{ url('/categoria/' . $categoria->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $categoria->nome }}" required>
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control">{{ $categoria->descricao }}</textarea>
    </div>

    <button class="btn btn-primary">Atualizar</button>
    <a href="{{ url('/categoria') }}" class="btn btn-secondary">Voltar</a>
</form>
</main>
@endsection
