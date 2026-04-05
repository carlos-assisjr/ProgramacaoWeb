@extends('layout')

@section('conteudo')
    <h1>Editar Unidade do Produto</h1>
    <form method="post" action="/unidade_produtos/{{ $unidade_produto->id }}">
        @CSRF
        @method('PUT')

        <div class="mb-3">
            <label for="produto_id" class="form-label">Selecione o produto:</label>
            <select name="produto_id" id="produto_id" class="form-select" required>
                @foreach($produtos as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $unidade_produto->produto_id ? 'selected' : '' }}>{{ $p->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="numero_serie" class="form-label">Informe o numero de série:</label>
            <input type="text" id="numero_serie" name="numero_serie" class="form-control" value="{{ $unidade_produto->numero_serie }}" required="">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Informe o status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="DISPONIVEL" {{ $unidade_produto->status == 'DISPONIVEL' ? 'selected' : '' }}>DISPONIVEL</option>
                <option value="ALUGADO" {{ $unidade_produto->status == 'ALUGADO' ? 'selected' : '' }}>ALUGADO</option>
                <option value="MANUTENCAO" {{ $unidade_produto->status == 'MANUTENCAO' ? 'selected' : '' }}>MANUTENCAO</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
@endsection