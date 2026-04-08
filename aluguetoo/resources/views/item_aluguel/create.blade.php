@extends('layout')

@section('conteudo')
<h1>Cadastrar Item do Aluguel</h1>

<form action="{{ route('itens_aluguel.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="aluguel_id" class="form-label">Aluguel:</label>
        <select name="aluguel_id" id="aluguel_id" class="form-select" required>
            <option value="">Selecione</option>
            @foreach ($alugueis as $aluguel)
                <option value="{{ $aluguel->id }}">
                    {{ $aluguel->id }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="ferramenta_id" class="form-label">Ferramenta:</label>
        <select name="ferramenta_id" id="ferramenta_id" class="form-select" required>
            <option value="">Selecione</option>
            @foreach ($ferramentas as $ferramenta)
                <option value="{{ $ferramenta->id }}">
                    {{ $ferramenta->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="valor_diaria_contratada" class="form-label">Valor da Diária Contratada:</label>
        <input type="number" step="0.01" name="valor_diaria_contratada" id="valor_diaria_contratada" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="loja_retirada_id" class="form-label">Loja de Retirada:</label>
        <select name="loja_retirada_id" id="loja_retirada_id" class="form-select" required>
            <option value="">Selecione</option>
            @foreach ($lojas as $loja)
                <option value="{{ $loja->id }}">
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
                <option value="{{ $loja->id }}">
                    {{ $loja->nome }}
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