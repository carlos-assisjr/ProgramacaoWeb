@extends('layout')

@section('conteudo')
<h1>Consultar Aluguel</h1>
<form method="post" action="/alugueis/{{ $aluguel->id }}">
    @CSRF
    @METHOD('DELETE')
    <div class="mb-3">

        <p><strong>ID:</strong> {{ $aluguel->id }}</p>
    </div>
    <div class="mb-3">
        <p><strong>Cliente:</strong> {{ $aluguel->cliente->nome ?? '-' }}</p>
    </div>
    <div class="mb-3">
        <p><strong>Status:</strong> {{ $aluguel->status }}</p>
    </div>

    <a href="{{ route('alugueis.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    <a href="{{ route('alugueis.edit', $aluguel->id) }}" class="btn btn-warning mt-3">Editar</a>
    @endsection