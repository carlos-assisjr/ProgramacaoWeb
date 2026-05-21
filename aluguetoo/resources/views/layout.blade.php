<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AlugueToo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">

            {{-- Logo/Home --}}
            <a class="navbar-brand fw-bold fs-4"
   href="
   @if(Auth::check())
        {{ Auth::user()->role == 'ADM' ? '/dashboard-adm' : '/dashboard-cli' }}
   @else
        /
   @endif
   ">
    AlugueToo
</a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                {{-- Menu esquerdo --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @if(Auth::check() && Auth::user()->role == "ADM")
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                               href="#"
                               id="dropdownCadastro"
                               role="button"
                               data-bs-toggle="dropdown">
                                Cadastros
                            </a>

                            <ul class="dropdown-menu shadow">
                                <li>
                                    <a class="dropdown-item" href="/categorias">
                                        Categorias
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/lojas">
                                        Lojas
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/equipamentos">
                                        Equipamentos
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/alugueis">
                                        Aluguéis
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/itens_aluguel">
                                        Itens do Aluguel
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if(Auth::check() && Auth::user()->role == "CLI")
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard-cli">
                                Meu Carrinho
                            </a>
                        </li>
                    @endif

                </ul>

                {{-- Lado direito --}}
                <div class="d-flex align-items-center gap-3">

                    @if(Auth::check())
                        <span class="text-white fw-semibold">
                            Olá, {{ Auth::user()->name }}
                        </span>

                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="/login" class="btn btn-light btn-sm">
                            Login
                        </a>
                    @endif

                </div>

            </div>
        </div>
    </nav>

    <main class="container py-4">
        @yield('conteudo')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>