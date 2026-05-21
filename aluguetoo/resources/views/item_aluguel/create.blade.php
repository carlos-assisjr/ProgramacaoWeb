@extends('layout')

@section('conteudo')
<h1>Cadastrar Item do Aluguel</h1>

<form action="{{ route('itens_aluguel.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="aluguel_id" class="form-label">Aluguel:</label>
        <select name="aluguel_id" id="aluguel_id" class="form-select" required>
            <option value="">Selecione</option>
            @foreach ($alugueis as $al)
                <option value="{{ $al->id }}">
                    {{ $al->id }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="equipamento_id" class="form-label">Equipamento:</label>
        <select name="equipamento_id" id="equipamento_id" class="form-select" required>
            <option value="">Selecione</option>
            @foreach ($equipamentos as $eq)
                <option value="{{ $eq->id }}">
                    {{ $eq->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="loja_retirada_id" class="form-label">Loja de Retirada:</label>
        <select name="loja_retirada_id" id="loja_retirada_id" class="form-select" required>
            <option value="">Selecione</option>
            @foreach ($lojas as $l)
                <option value="{{ $l->id }}">
                    {{ $l->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="loja_devolucao_id" class="form-label">Loja de Devolução:</label>
        <select name="loja_devolucao_id" id="loja_devolucao_id" class="form-select">
            <option value="">Selecione</option>
            @foreach ($lojas as $l)
                <option value="{{ $l->id }}">
                    {{ $l->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="data_inicio" class="form-label">Data de Início:</label>
        <input type="datetime-local" name="data_inicio" id="data_inicio" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="data_fim_prevista" class="form-label">Data Fim Prevista:</label>
        <input type="datetime-local" name="data_fim_prevista" id="data_fim_prevista" class="form-control">
    </div>

    <div class="mb-3">
        <label for="data_devolucao" class="form-label">Data de Devolução:</label>
        <input type="datetime-local" name="data_devolucao" id="data_devolucao" class="form-control">
    </div>


    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('itens_aluguel.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection