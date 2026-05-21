@extends('layout')

@section('conteudo')
<h1>Editar Aluguel</h1>

<form action="{{ route('alugueis.update', $aluguel->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Usuário:</label>
        <select name="user_id" class="form-select" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ $aluguel->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Status:</label>
        <select name="status" class="form-select" required>
            <option value="RESERVADO" {{ $aluguel->status == 'RESERVADO' ? 'selected' : '' }}>RESERVADO</option>
            <option value="RETIRADO" {{ $aluguel->status == 'RETIRADO' ? 'selected' : '' }}>RETIRADO</option>
            <option value="DEVOLVIDO" {{ $aluguel->status == 'DEVOLVIDO' ? 'selected' : '' }}>DEVOLVIDO</option>
            <option value="ATRASADO" {{ $aluguel->status == 'ATRASADO' ? 'selected' : '' }}>ATRASADO</option>
        </select>
    </div>

    <button class="btn btn-primary">Atualizar</button>
    <a href="{{ route('alugueis.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection