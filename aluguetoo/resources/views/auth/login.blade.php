@extends('site.layout')

@section('conteudo')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Login</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ url('/login') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Senha</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-primary w-100">Entrar</button>
                </form>

                <p class="mt-3 text-center">
                    Não tem conta?
                    <a href="{{ url('/register') }}">Cadastre-se</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
