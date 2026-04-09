@extends('layout')

@section('conteudo')
<h1>Criar Aluguel</h1>
<form method="post" action="/alugueis">
    @CSRF

    <div class="mb-3">
        <label for="cliente_id" class="form-label">Informe o Cliente:</label>
        <select name="cliente_id" id="cliente_id" class="form-select" required>
            @foreach($clientes as $cl)
            <option value="{{ $cl->id }}">{{ $cl->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <select name="status" id="status" class="form-select" required>
            <option value="RESERVADO">RESERVADO</option>
            <option value="RETIRADO">RETIRADO</option>
            <option value="DEVOLVIDO">DEVOLVIDO</option>
            <option value="ATRASADO">ATRASADO</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Enviar</button>
    <a href="{{ route('alugueis.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection