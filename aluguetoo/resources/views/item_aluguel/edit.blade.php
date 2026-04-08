@extends('layout')

@section('conteudo')
<h1>Editar Item do Aluguel</h1>

<form action="{{ route('itens_aluguel.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="aluguel_id" class="form-label">Aluguel:</label>
        <select name="aluguel_id" id="aluguel_id" class="form-select" required>
            @foreach ($alugueis as $aluguel)
            <option value="{{ $aluguel->id }}"
                {{ $item->aluguel_id == $aluguel->id ? 'selected' : '' }}>
                {{ $aluguel->id }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="ferramenta_id" class="form-label">Ferramenta:</label>
        <select name="ferramenta_id" id="ferramenta_id" class="form-select" required>
            @foreach ($ferramentas as $ferramenta)
            <option value="{{ $ferramenta->id }}"
                {{ $item->ferramenta_id == $ferramenta->id ? 'selected' : '' }}>
                {{ $ferramenta->nome }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="loja_retirada_id" class="form-label">Loja de Retirada:</label>
        <select name="loja_retirada_id" id="loja_retirada_id" class="form-select" required>
            @foreach ($lojas as $loja)
            <option value="{{ $loja->id }}"
                {{ $item->loja_retirada_id == $loja->id ? 'selected' : '' }}>
                {{ $loja->nome }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="loja_devolucao_id" class="form-label">Loja de Devolução:</label>
        <select name="loja_devolucao_id" id="loja_devolucao_id" class="form-select">
            <option value="">Selecione</option>
            @foreach ($lojas as $loja)
            <option value="{{ $loja->id }}"
                {{ $item->loja_devolucao_id == $loja->id ? 'selected' : '' }}>
                {{ $loja->nome }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="data_inicio" class="form-label">Data de Início:</label>
        <input type="datetime-local" name="data_inicio" id="data_inicio" class="form-control"
            value="{{ $item->data_inicio ? date('Y-m-d\TH:i', strtotime($item->data_inicio)) : '' }}" required>
    </div>

    <div class="mb-3">
        <label for="data_fim_prevista" class="form-label">Data Fim Prevista:</label>
        <input type="datetime-local" name="data_fim_prevista" id="data_fim_prevista" class="form-control"
            value="{{ $item->data_fim_prevista ? date('Y-m-d\TH:i', strtotime($item->data_fim_prevista)) : '' }}">
    </div>

    <div class="mb-3">
        <label for="data_devolucao" class="form-label">Data de Devolução:</label>
        <input type="datetime-local" name="data_devolucao" id="data_devolucao" class="form-control"
            value="{{ $item->data_devolucao ? date('Y-m-d\TH:i', strtotime($item->data_devolucao)) : '' }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Valor da diária contratada</label>
        <input type="text" class="form-control"
            value="R$ {{ number_format($item->valor_diaria_contratada, 2, ',', '.') }}" readonly>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('itens_aluguel.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection