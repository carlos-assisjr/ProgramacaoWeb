@extends('layout')

@section('conteudo')
    <h1>Consultar Produto</h1>
    <form method="post" action="/produtos/{{ $produto->id }}">
        @CSRF
        @METHOD('DELETE')

        <div class="mb-3">
            <p>Nome: <strong>{{ $produto->nome }}</strong></p>
        </div>

        <div class="mb-3">
            <p>Descrição: <strong>{{ $produto->descricao }}</strong></p>
        </div>

        <div class="mb-3">
            <p>Categoria ID: <strong>{{ $produto->categoria_id }}</strong></p>
        </div>

        <div class="mb-3">
            <p>Valor da diária: <strong>R$ {{ number_format($produto->valor_diaria, 2, ',', '.') }}</strong></p>
        </div>

        <div class="mb-3">
            <p>Valor do caução: <strong>R$ {{ number_format($produto->valor_caucao, 2, ',', '.') }}</strong></p>
        </div>

        <div class="mb-3">
            <p>Cidade: <strong>{{ $produto->localizacao_cidade }}</strong></p>
        </div>

        <div class="mb-3">
            <p>Bairro: <strong>{{ $produto->localizacao_bairro }}</strong></p>
        </div>

        <div class="mb-3">
            <p>Status: <strong>{{ $produto->status }}</strong></p>
        </div>

        <button type="submit" class="btn btn-danger">Excluir o registro</button>
        <a href="/produtos" class="btn btn-secondary">Voltar</a>
    </form>
@endsection