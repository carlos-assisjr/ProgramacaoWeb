<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista Exercicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> Lista de Exercícios</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Exerc 1 a 5
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1">
                            <li><a class="dropdown-item" href="/exerc1">Exercício1</a></li>
                            <li><a class="dropdown-item" href="/exerc2">Exercício2</a></li>
                            <li><a class="dropdown-item" href="/exerc3">Exercício3</a></li>
                            <li><a class="dropdown-item" href="/exerc4">Exercício4</a></li>
                            <li><a class="dropdown-item" href="/exerc5">Exercício5</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Exerc 6 a 10
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown2">
                            <li><a class="dropdown-item" href="/exerc6">Exercício6</a></li>
                            <li><a class="dropdown-item" href="/exerc7">Exercício7</a></li>
                            <li><a class="dropdown-item" href="/exerc8">Exercício8</a></li>
                            <li><a class="dropdown-item" href="/exerc9">Exercício9</a></li>
                            <li><a class="dropdown-item" href="/exerc10">Exercício10</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Exerc 11 a 15
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown3">
                            <li><a class="dropdown-item" href="/exerc11">Exercício11</a></li>
                            <li><a class="dropdown-item" href="/exerc12">Exercício12</a></li>
                            <li><a class="dropdown-item" href="/exerc13">Exercício13</a></li>
                            <li><a class="dropdown-item" href="/exerc14">Exercício14</a></li>
                            <li><a class="dropdown-item" href="/exerc15">Exercício15</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Exerc 16 a 20
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown4">
                            <li><a class="dropdown-item" href="/exerc16">Exercício16</a></li>
                            <li><a class="dropdown-item" href="/exerc17 ">Exercício17</a></li>
                            <li><a class="dropdown-item" href="/exerc18">Exercício18</a></li>
                            <li><a class="dropdown-item" href="/exerc19">Exercício19</a></li>
                            <li><a class="dropdown-item" href="/exerc20">Exercício20</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-3">

        @yield('conteudo')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>