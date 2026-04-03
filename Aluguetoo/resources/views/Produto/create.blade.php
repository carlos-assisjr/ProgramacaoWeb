@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Produto</h1>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descrição</label>
            <textarea name="descricao" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Valor Diária</label>
            <input type="number" step="0.01" name="valor_diaria" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Estoque</label>
            <input type="number" name="estoque" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="DISPONIVEL">Disponível</option>
                <option value="INDISPONIVEL">Indisponível</option>
                <option value="MANUTENCAO">Manutenção</option>
            </select>
        </div>

        <button class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection