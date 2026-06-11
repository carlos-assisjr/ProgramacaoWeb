@extends('site.layout')

@section('conteudo')
<main class="dashboard-container">
<h1>Categoria</h1>

<div class="card">
    <div class="card-body">
        <p><strong>ID:</strong> {{ $categoria->id }}</p>
        <p><strong>Nome:</strong> {{ $categoria->nome }}</p>
        <p><strong>Descrição:</strong> {{ $categoria->descricao }}</p>
    </div>
</div>

<a href="{{ url('/categoria') }}" class="btn btn-secondary mt-3">Voltar</a>
</main>
@endsection
