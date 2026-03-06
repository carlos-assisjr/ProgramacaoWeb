@extends('layout')
@section('conteudo')
<h1>Criar Categoria</h1>
<form method="post" action="/categorias/{{$categoria->id}}">
    @CSRF
    @method('DELETE')
<div class="mb-3">
              <p>nome: <strong> {{$categoria->nome}}</strong></p>
            </div><div class="mb-3">
              <p> descrição  <strong> {{$categoria->descricao}}</strong></p>
            </div>
<button type="submit" class="btn btn-danger">Excluir o registro</button>
<a hreaf= "/categorias" class ="btn btn-secundary" >Voltar</p>
</form>
@endsection
