@extends('layout')

@section('conteudo')
<h1>Criar Ferramenta</h1>

<form method="post" action="/ferramentas">
    @CSRF
    <div class="mb-3">
        <label>Informe o nome:</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Informe a marca:</label>
        <input type="text" name="marca" class="form-control">
    </div>
    <div class="mb-3">
        <label>Informe o numero de série:</label>
        <input type="text" name="numero_serie" class="form-control">
    </div>
    <div class="mb-3">
        <label>Informe a descrição:</label>
        <input type="text" name="descricao" class="form-control">
    </div>
        <div class="mb-3">
        <label for="loja_id" class="form-label">Informe a Loja:</label>
        <select name="loja_id" id="loja_id" class="form-select" required>
            <option value="">Selecione</option>
            @foreach ($lojas as $l)
                <option value="{{ $l->id }}">
                    {{ $l->nome }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Valor diária:</label>
        <input type="number" step="0.01" name="valor_diaria" class="form-control">
    </div>
    <div class="mb-3">
        <label>Categoria:</label>
        <select name="categoria_id" class="form-control">
            @foreach ($categorias as $c)
            <option value="{{ $c->id }}">{{ $c->nome }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
        <a href="/ferramentas" class="btn btn-secondary">Voltar</a>

</form>

@endsection