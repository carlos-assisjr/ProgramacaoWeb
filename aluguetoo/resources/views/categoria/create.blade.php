@extends('site.layout')

@section('conteudo')
<h1>Nova Categoria</h1>

<form action="{{ url('/categoria') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="{{ url('/categoria') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
