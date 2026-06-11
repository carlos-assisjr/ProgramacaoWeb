@extends('site.layout')

@section('conteudo')
<h1>Editar Aluguel</h1>

<form action="{{ url('/aluguel/' . $aluguel->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="RESERVADO" @selected($aluguel->status == 'RESERVADO')>RESERVADO</option>
            <option value="RETIRADO" @selected($aluguel->status == 'RETIRADO')>RETIRADO</option>
            <option value="DEVOLVIDO" @selected($aluguel->status == 'DEVOLVIDO')>DEVOLVIDO</option>
            <option value="ATRASADO" @selected($aluguel->status == 'ATRASADO')>ATRASADO</option>
        </select>
    </div>

    <button class="btn btn-primary">Atualizar</button>
    <a href="{{ url('/aluguel') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
