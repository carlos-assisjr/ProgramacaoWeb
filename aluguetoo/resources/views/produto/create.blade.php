@extends('layout')

@section('conteudo')
    <h1>Criar Produto</h1>

    <form method="post" action="/produtos">
        @CSRF

        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descrição:</label>
            <input type="text" name="descricao" class="form-control">
        </div>

        <div class="mb-3">
            <label>Categoria:</label>
            <select name="categoria_id" class="form-control">
                @foreach ($categorias as $c)
                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Valor diária:</label>
            <input type="number" step="0.01" name="valor_diaria" class="form-control">
        </div>

        <button class="btn btn-primary">Salvar</button>
    </form>
@endsection