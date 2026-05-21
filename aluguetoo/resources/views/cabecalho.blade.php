<!-- resources/views/cabecalho.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">App Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if(Auth::check() && Auth:: user()->role === 'ADM')
                <!-- Links para administradores -->
                <li class="nav-item">
                    <a class="nav-link" href="/usuarios">Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categorias">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/produtos">Produtos</a>
                </li>
                @elseif (Auth::check() && Auth:: user()->role === 'CLI')
                <!-- Link para clientes -->
                <li class="nav-item">
                    <a class="nav-link" href="/carrinho">Carrinho de Compras</a>
                </li>
                @endif
            </ul>
            @if(Auth::check())
            <div class="d-flex ms-auto align-items-center">
                <span class="navbar-text text-white me-3">
                    Bem-vindo, {{ Auth:: user()->name }}
                </span>
                <a class="btn btn-danger" href="/logout">Sair</a>
            </div>
            @endif
        </div>
    </div>
</nav>