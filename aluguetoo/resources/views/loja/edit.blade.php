@extends('site.layout')

@section('conteudo')
<h1>Editar Loja</h1>

<form action="{{ url('/loja/' . $loja->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $loja->nome }}" required>
    </div>

    <div class="mb-3">
        <label>Endereço</label>
        <input type="text" name="endereco" class="form-control" value="{{ $loja->endereco }}" required>
    </div>

    <div class="mb-3">
        <label>Cidade</label>
        <input type="text" name="cidade" class="form-control" value="{{ $loja->cidade }}" required>
    </div>

    <div class="mb-3">
        <label>Estado</label>
        <input type="text" name="estado" class="form-control" value="{{ $loja->estado }}" required>
    </div>

    <div class="mb-3">
        <label>CEP</label>
        <input type="text" name="cep" class="form-control" value="{{ $loja->cep }}" required>
    </div>

    <button class="btn btn-primary">Atualizar</button>
    <a href="{{ url('/loja') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
