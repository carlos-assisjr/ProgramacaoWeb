@extends('layout')

@section('conteudo')
    <h1>Criar Usuário</h1>
    <form method="post" action="/users">
        @CSRF
        <div class="mb-3">
            <label for="nome" class="form-label">Informe o nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Informe o e-mail:</label>
            <input type="email" id="email" name="email" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Informe a senha:</label>
            <input type="password" id="senha" name="senha" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection