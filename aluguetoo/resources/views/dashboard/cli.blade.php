@extends('site.layout')

@section('conteudo')
<h1>Área do Cliente</h1>

<div class="row mt-4">

    <div class="col-md-4 mb-3">
        <a href="{{ url('/meus-alugueis') }}" class="btn btn-outline-primary w-100">Meus Aluguéis</a>
    </div>
</div>
@endsection
