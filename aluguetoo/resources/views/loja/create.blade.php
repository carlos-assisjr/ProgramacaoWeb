@extends('layout')

@section('conteudo')
<h1>Cadastrar Ferramenta</h1>

<form action="{{ route('ferramentas.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="marca" class="form-label">Marca:</label>
        <input type="text" name="marca" id="marca" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="numero_serie" class="form-label">Número de Série:</label>
        <input type="text" name="numero_serie" id="numero_serie" class="form-control">
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição:</label>
        <textarea name="descricao" id="descricao" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="categoria_id" class="form-label">Categoria:</label>
        <select name="categoria_id" id="categoria_id" class="form-select" required>
            <option value="">Selecione</option>
            @foreach ($categorias as $c)
                <option value="{{ $c->id }}">{{ $c->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="loja_id" class="form-label">Loja:</label>
        <select name="loja_id" id="loja_id" class="form-select" required>
            <option value="">Selecione</option>
            @foreach ($lojas as $loja)
                <option value="{{ $loja->id }}">{{ $loja->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="valor_diaria" class="form-label">Valor da Diária:</label>
        <input type="number" step="0.01" name="valor_diaria" id="valor_diaria" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <select name="status" id="status" class="form-select" required>
            <option value="DISPONIVEL">DISPONIVEL</option>
            <option value="INDISPONIVEL">INDISPONIVEL</option>
            <option value="MANUTENCAO">MANUTENCAO</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('ferramentas.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection