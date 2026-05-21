@extends('layout')

@section('conteudo')
<h1>Consultar Equipamento</h1>
<form method="post" action="/equipamentos/{{ $equipamento->id }}">
    @CSRF
    @METHOD('DELETE')

    <div class="mb-3">
        <p>Nome: <strong>{{ $equipamento->nome }}</strong></p>
    </div>
    
    <div class="mb-3">
        <p>Categoria ID: <strong>{{ $equipamento->categoria_id }}</strong></p>
    </div>
    <div class="mb-3">
        <p>Número de série: <strong>{{ $equipamento->numero_serie }}</strong></p>
    </div>
    <div class="mb-3">
        <p>Loja ID: <strong>{{ $equipamento->loja_id }}</strong></p>
    </div>
    <div class="mb-3">
        <p>Descrição: <strong>{{ $equipamento->descricao }}</strong></p>
    </div>
    <div class="mb-3">
        <p>Marca: <strong>{{ $equipamento->marca }}</strong></p>
    </div>

    <div class="mb-3">
        <p>Valor da diária: <strong>R$ {{ number_format($equipamento->valor_diaria, 2, ',', '.') }}</strong></p>
    </div>


    <div class="mb-3">
        <p>Status: <strong>{{ $equipamento->status }}</strong></p>
    </div>

    <button type="submit" class="btn btn-danger">Excluir o registro</button>
    <a href="/equipamentos" class="btn btn-secondary">Voltar</a>
</form>
@endsection