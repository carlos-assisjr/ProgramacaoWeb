@extends('site.layout')

@section('conteudo')
<h1>Editar Equipamento</h1>

<form action="{{ url('/equipamento/' . $equipamento->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $equipamento->nome }}" required>
    </div>

    <div class="mb-3">
        <label>Marca</label>
        <input type="text" name="marca" class="form-control" value="{{ $equipamento->marca }}">
    </div>

    <div class="mb-3">
        <label>Número de série</label>
        <input type="text" name="numero_serie" class="form-control" value="{{ $equipamento->numero_serie }}">
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control">{{ $equipamento->descricao }}</textarea>
    </div>

    <div class="mb-3">
        <label>Categoria</label>
        <select name="categoria_id" class="form-control" required>
            @foreach($categorias ?? [] as $categoria)
                <option value="{{ $categoria->id }}" @selected($equipamento->categoria_id == $categoria->id)>
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Loja</label>
        <select name="loja_id" class="form-control" required>
            @foreach($lojas ?? [] as $loja)
                <option value="{{ $loja->id }}" @selected($equipamento->loja_id == $loja->id)>
                    {{ $loja->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Valor da diária</label>
        <input type="number" step="0.01" name="valor_diaria" class="form-control" value="{{ $equipamento->valor_diaria }}" required>
    </div>

    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">

        @if($equipamento->foto)
            <img src="{{ asset('storage/' . $equipamento->foto) }}" width="120" class="mt-2">
        @endif
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="DISPONIVEL" @selected($equipamento->status == 'DISPONIVEL')>DISPONÍVEL</option>
            <option value="INDISPONIVEL" @selected($equipamento->status == 'INDISPONIVEL')>INDISPONÍVEL</option>
            <option value="MANUTENCAO" @selected($equipamento->status == 'MANUTENCAO')>MANUTENÇÃO</option>
        </select>
    </div>

    <button class="btn btn-primary">Atualizar</button>
    <a href="{{ url('/equipamento') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
