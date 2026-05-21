@extends('layout')

@section('conteudo')
<h1>Criar Aluguel</h1>
<form method="post" action="/alugueis">
    @CSRF

    <div class="mb-3">
        <label for="user_id" class="form-label">Informe o Usuário:</label>
        <select name="user_id" id="user_id" class="form-select" required>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
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