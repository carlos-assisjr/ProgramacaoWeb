@extends('layout')

@section('conteudo')
<h2> Produtos</h2>
<a href="produtos/create" class="btn btn-success mb-3">Novo Registro</a>
<table class="table table-hover table-striped">
  <thead>

    <tr>
      <th>Nome</th>
      <th>Categoria</th>
      <th>Valor Diária</th>
      <th>Estoque</th>
      <th>Status</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($produtos as $p)
    <tr>
      <td> {{ $p->Nome }}</td>
      <td> {{ $p->categoria->nome }}</td>
      <td> {{ $p->valor_diaria }}</td>
      <td> {{ $p->estoque }}</td>
      <td> {{ $p->status }}</td>
      <td class="d-flex gap-2">
        <a href="/produtos/{{ $p->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
        <a href="/produtos/{{ $p->id }}" class="btn btn-sm btn-info">Consultar</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection