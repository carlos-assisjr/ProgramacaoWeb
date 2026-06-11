@extends('site.layout')

@section('conteudo')
<main class="dashboard-container">
<h1>Novo Equipamento</h1>

<form action="{{ url('/equipamento') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Marca</label>
        <input type="text" name="marca" class="form-control">
    </div>

    <div class="mb-3">
        <label>Número de série</label>
        <input type="text" name="numero_serie" class="form-control">
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Categoria</label>
        <select name="categoria_id" class="form-control" required>
            <option value="">Selecione</option>
            @foreach($categorias ?? [] as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Loja</label>
        <select name="loja_id" class="form-control" required>
            <option value="">Selecione</option>
            @foreach($lojas ?? [] as $loja)
                <option value="{{ $loja->id }}">{{ $loja->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Valor da diária</label>
        <input type="number" step="0.01" name="valor_diaria" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="DISPONIVEL">DISPONÍVEL</option>
            <option value="INDISPONIVEL">INDISPONÍVEL</option>
            <option value="MANUTENCAO">MANUTENÇÃO</option>
        </select>
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="{{ url('/equipamento') }}" class="btn btn-secondary">Voltar</a>
</form>
</main>
@endsection
