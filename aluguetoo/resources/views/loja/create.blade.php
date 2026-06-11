@extends('site.layout')

@section('conteudo')
<h1>Nova Loja</h1>

<form action="{{ url('/loja') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Endereço</label>
        <input type="text" name="endereco" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Cidade</label>
        <input type="text" name="cidade" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Estado</label>
        <input type="text" name="estado" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>CEP</label>
        <input type="text" name="cep" class="form-control" required>
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="{{ url('/loja') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
