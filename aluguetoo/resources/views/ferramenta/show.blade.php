@extends('layout')

@section('conteudo')
<h1>Consultar Ferramenta</h1>
<form method="post" action="/ferramentas/{{ $ferramenta->id }}">
    @CSRF
    @METHOD('DELETE')

    <div class="mb-3">
        <p>Nome: <strong>{{ $ferramenta->nome }}</strong></p>
    </div>
    
    <div class="mb-3">
        <p>Categoria ID: <strong>{{ $ferramenta->categoria_id }}</strong></p>
    </div>
    <div class="mb-3">
        <p>Número de série: <strong>{{ $ferramenta->numero_serie }}</strong></p>
    </div>
    <div class="mb-3">
        <p>Loja ID: <strong>{{ $ferramenta->loja_id }}</strong></p>
    </div>
    <div class="mb-3">
        <p>Descrição: <strong>{{ $ferramenta->descricao }}</strong></p>
    </div>
    <div class="mb-3">
        <p>Marca: <strong>{{ $ferramenta->marca }}</strong></p>
    </div>

    <div class="mb-3">
        <p>Valor da diária: <strong>R$ {{ number_format($ferramenta->valor_diaria, 2, ',', '.') }}</strong></p>
    </div>


    <div class="mb-3">
        <p>Status: <strong>{{ $ferramenta->status }}</strong></p>
    </div>

    <button type="submit" class="btn btn-danger">Excluir o registro</button>
    <a href="/ferramentas" class="btn btn-secondary">Voltar</a>
</form>
@endsection