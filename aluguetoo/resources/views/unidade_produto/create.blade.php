@extends('layout')

@section('conteudo')
    <h1>Criar Unidade do Produto</h1>
    <form method="post" action="/unidade_produtos">
        @CSRF

        <div class="mb-3">
            <label for="produto_id" class="form-label">Selecione o produto:</label>
            <select name="produto_id" id="produto_id" class="form-select" required>
                @foreach($produtos as $p)
                    <option value="{{ $p->id }}">{{ $p->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="numero_serie" class="form-label">Informe o numero de série:</label>
            <input type="text" id="numero_serie" name="numero_serie" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Informe o status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="DISPONIVEL">DISPONIVEL</option>
                <option value="ALUGADO">ALUGADO</option>
                <option value="MANUTENCAO">MANUTENCAO</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection

@