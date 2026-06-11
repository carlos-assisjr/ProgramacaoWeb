<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlugueToo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .logo-text {
            font-size: 32px;
            font-weight: 800;
            text-decoration: none;
        }

        .logo-text span:first-child {
            color: #0d6efd;
        }

        .logo-text span:last-child {
            color: #111;
        }

        .navbar-custom {
            background-color: #ffffff;
            min-height: 90px;
            border-bottom: 1px solid #e9ecef;
        }

        .menu-link {
            position: relative;
            display: inline-block !important;
            padding: 0 !important;
            margin-left: 15px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #333 !important;
            text-decoration: none;
        }

        .menu-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -3px;
            width: 0;
            height: 1px;
            background-color: #000;
            transition: width 0.2s ease;
        }

        .menu-link:hover::after {
            width: 100%;
        }

        .user-icon {
            font-size: 28px;
            color: #333 !important;
            transition: 0.3s ease;
        }

        .user-icon:hover {
            color: #000 !important;
            transform: scale(1.05);
        }

        .cart-btn {
            color: #0d6efd;
            border: 1.5px solid #0d6efd;
            transition: 0.3s ease;
        }

        .cart-btn:hover {
            background-color: #0d6efd;
            color: #fff;
        }

        .carousel-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .transition-hover:hover {
            transform: translateY(-5px);
            transition: 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        footer {
            background: #ffffff;
            border-top: 1px solid #dee2e6;
            padding: 20px 0;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-custom shadow-sm">
        <div class="container">

            <a class="navbar-brand logo-text" href="{{ url('/') }}">
                <span>Alugue</span><span>Too</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav align-items-">

                    @auth
                    @if(auth()->user()->role === 'ADM')

                    <li class="nav-item">
                        <a class="nav-link menu-link " href="{{ url('/dashboard.adm') }}">
                            Dashboard
                        </a>
                    </li>
                    @endif
                    @endauth

                </ul>

                <ul class="navbar-nav ms-auto align-items-center">

                    @auth
                    @if(auth()->user()->role === 'CLI')
                    <li class="nav-item me-3">
                        <a class="btn cart-btn rounded-pill px-4" href="{{ url('/carrinho') }}">
                            <i class="bi bi-cart3"></i>
                        </a>
                    </li>
                    @endif
                    @endauth

                    <li class="nav-item dropdown">
                        <a class="nav-link user-icon"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                            <i class="bi bi-person-circle"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4">

                            @guest
                            <li>
                                <a class="dropdown-item" href="{{ url('/login') }}">
                                    Login
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ url('/register') }}">
                                    Registrar
                                </a>
                            </li>
                            @endguest

                            @auth
                            <li class="dropdown-item-text fw-bold">
                                {{ auth()->user()->name }}
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            @if(auth()->user()->role === 'ADM')
                            <li>
                                <a class="dropdown-item" href="{{ url('/dashboard.adm') }}">
                                    Painel ADM
                                </a>
                            </li>
                            @else
                            <li>
                                <a class="dropdown-item" href="{{ url('/dashboard.cli') }}">
                                    Minha Área
                                </a>
                            </li>
                            @endif

                            <li>
                                <form method="POST" action="{{ url('/logout') }}">
                                    @csrf

                                    <button type="submit" class="dropdown-item">
                                        Sair
                                    </button>
                                </form>
                            </li>
                            @endauth

                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container mt-3">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        </div>

        @yield('conteudo')
    </main>

    <footer>
        <div class="container text-center">
            <p class="text-muted mb-0 small">
                © 2026 - AlugueToo - Sistema de Aluguel de Equipamentos
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>