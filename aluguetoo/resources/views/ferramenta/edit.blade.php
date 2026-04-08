@extends('layout')

@section('conteudo')
<h1>Editar Ferramenta</h1>

<form action="{{ route('ferramentas.update', $ferramenta->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control"
            value="{{ $ferramenta->nome }}" required>
    </div>

    <div class="mb-3">
        <label for="marca" class="form-label">Marca:</label>
        <input type="text" name="marca" id="marca" class="form-control"
            value="{{ $ferramenta->marca }}" required>
    </div>

    <div class="mb-3">
        <label for="numero_serie" class="form-label">Número de Série:</label>
        <input type="text" name="numero_serie" id="numero_serie" class="form-control"
            value="{{ $ferramenta->numero_serie }}">
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição:</label>
        <textarea name="descricao" id="descricao" class="form-control">{{ $ferramenta->descricao }}</textarea>
    </div>

    <div class="mb-3">
        <label for="categoria_id" class="form-label">Categoria:</label>
        <select name="categoria_id" id="categoria_id" class="form-select" required>
            @foreach ($categorias as $c)
                <option value="{{ $c->id }}"
                    {{ $ferramenta->categoria_id == $c->id ? 'selected' : '' }}>
                    {{ $c->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="loja_id" class="form-label">Loja:</label>
        <select name="loja_id" id="loja_id" class="form-select" required>
            @foreach ($lojas as $l)
                <option value="{{ $l->id }}"
                    {{ $ferramenta->loja_id == $l->id ? 'selected' : '' }}>
                    {{ $l->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="valor_diaria" class="form-label">Valor da Diária:</label>
        <input type="number" step="0.01" name="valor_diaria" id="valor_diaria" class="form-control"
            value="{{ $ferramenta->valor_diaria }}" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <select name="status" id="status" class="form-select" required>
            <option value="DISPONIVEL" {{ $ferramenta->status == 'DISPONIVEL' ? 'selected' : '' }}>DISPONIVEL</option>
            <option value="INDISPONIVEL" {{ $ferramenta->status == 'INDISPONIVEL' ? 'selected' : '' }}>INDISPONIVEL</option>
            <option value="MANUTENCAO" {{ $ferramenta->status == 'MANUTENCAO' ? 'selected' : '' }}>MANUTENCAO</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('ferramentas.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection