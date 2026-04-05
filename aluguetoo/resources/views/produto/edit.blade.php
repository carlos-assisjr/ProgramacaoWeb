@extends('layout')

@section('conteudo')
    <h1>Editar Produto</h1>
    <form method="post" action="/produtos/{{ $produto->id }}">
        @CSRF
        @METHOD('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Informe o nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required value="{{ $produto->nome }}">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Informe a descrição:</label>
            <input type="text" id="descricao" name="descricao" class="form-control" value="{{ $produto->descricao }}">
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Selecione a categoria:</label>
            <select name="categoria_id" id="categoria_id" class="form-select" required>
                @foreach ($categorias as $c)
                    <option value="{{ $c->id }}" {{ $produto->categoria_id == $c->id ? 'selected' : '' }}>
                        {{ $c->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="valor_diaria" class="form-label">Informe o valor da diária:</label>
            <input type="number" step="0.01" id="valor_diaria" name="valor_diaria" class="form-control" required value="{{ $produto->valor_diaria }}">
        </div>

        <div class="mb-3">
            <label for="valor_caucao" class="form-label">Informe o valor do caução:</label>
            <input type="number" step="0.01" id="valor_caucao" name="valor_caucao" class="form-control" value="{{ $produto->valor_caucao }}">
        </div>

        <div class="mb-3">
            <label for="localizacao_cidade" class="form-label">Cidade:</label>
            <input type="text" id="localizacao_cidade" name="localizacao_cidade" class="form-control" value="{{ $produto->localizacao_cidade }}">
        </div>

        <div class="mb-3">
            <label for="localizacao_bairro" class="form-label">Bairro:</label>
            <input type="text" id="localizacao_bairro" name="localizacao_bairro" class="form-control" value="{{ $produto->localizacao_bairro }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="ATIVO" {{ $produto->status == 'ATIVO' ? 'selected' : '' }}>ATIVO</option>
                <option value="INATIVO" {{ $produto->status == 'INATIVO' ? 'selected' : '' }}>INATIVO</option>
                <option value="PAUSADO" {{ $produto->status == 'PAUSADO' ? 'selected' : '' }}>PAUSADO</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection