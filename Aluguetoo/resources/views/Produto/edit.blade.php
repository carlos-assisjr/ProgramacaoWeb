@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Produto</h1>

    <form action="{{ route('produtos.update', $p->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $p->nome }}">
        </div>

        <div class="mb-3">
            <label>Descrição</label>
            <textarea name="descricao" class="form-control">{{ $p->descricao }}</textarea>
        </div>

        <div class="mb-3">
            <label>Valor Diária</label>
            <input type="number" step="0.01" name="valor_diaria" class="form-control" value="{{ $p->valor_diaria }}">
        </div>

        <div class="mb-3">
            <label>Estoque</label>
            <input type="number" name="estoque" class="form-control" value="{{ $p->estoque }}">
        </div>

        <div class="mb-3">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        {{ $produto->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="DISPONIVEL" {{ $produto->status == 'DISPONIVEL' ? 'selected' : '' }}>Disponível</option>
                <option value="INDISPONIVEL" {{ $produto->status == 'INDISPONIVEL' ? 'selected' : '' }}>Indisponível</option>
                <option value="MANUTENCAO" {{ $produto->status == 'MANUTENCAO' ? 'selected' : '' }}>Manutenção</option>
            </select>
        </div>

        <button class="btn btn-success">Atualizar</button>
    </form>
</div>
@endsection