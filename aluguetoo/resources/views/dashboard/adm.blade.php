@extends('site.layout')

@section('conteudo')

<style>
    .admin-wrapper {
        margin-top: -16px;
    }

    .sidebar {
        min-height: calc(100vh - 90px);
        background: #212529;
        color: white;
    }

    .sidebar .nav-link {
        color: rgba(255, 255, 255, 0.75);
        border-radius: 8px;
        padding: 10px 12px;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        color: white;
        background: rgba(255, 255, 255, 0.12);
    }

    .card-dashboard {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
    }
</style>

<div class="container-fluid admin-wrapper">
    <div class="row">

        <!-- SIDEBAR -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar p-3">

            <div class="mb-4">
                <span class="fs-4 fw-bold">AlugueToo</span>
                <p class="small text-white-50 mb-0">Painel Administrativo</p>
            </div>

            <ul class="nav flex-column gap-2">

                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link active">
                        <i class="bi bi-speedometer2 me-2"></i>
                        Relatório Geral
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/categoria') }}" class="nav-link">
                        <i class="bi bi-tags me-2"></i>
                        Categorias
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/loja') }}" class="nav-link">
                        <i class="bi bi-shop me-2"></i>
                        Lojas
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/equipamento') }}" class="nav-link">
                        <i class="bi bi-tools me-2"></i>
                        Equipamentos
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/user') }}" class="nav-link">
                        <i class="bi bi-people me-2"></i>
                        Usuários
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/aluguel') }}" class="nav-link">
                        <i class="bi bi-calendar-check me-2"></i>
                        Aluguéis
                    </a>
                </li>

            </ul>

            <hr>

            <form action="{{ url('/logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100 mt-3">
                    <i class="bi bi-box-arrow-right me-2"></i>
                    Sair
                </button>
            </form>

        </nav>

        <!-- CONTEÚDO -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                <div>
                    <h1 class="h2 mb-0">
                        Bem-vindo, {{ auth()->user()->name }}!
                    </h1>
                    <p class="text-muted mb-0">
                        Administração do sistema AlugueToo
                    </p>
                </div>

                <div class="text-muted">
                    {{ date('d/m/Y') }}
                </div>
            </div>

            <!-- CARDS -->
            <div class="row mb-4">

                <div class="col-md-4 mb-3">
                    <div class="card card-dashboard p-3 bg-primary text-white">
                        <h6>Total de Clientes</h6>
                        <h3>{{ $totalClientes ?? 0 }}</h3>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card card-dashboard p-3 bg-success text-white">
                        <h6>Total de Equipamentos</h6>
                        <h3>{{ $totalEquipamentos ?? 0 }}</h3>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card card-dashboard p-3 bg-warning text-dark">
                        <h6>Total de Aluguéis</h6>
                        <h3>{{ $totalAlugueis ?? 0 }}</h3>
                    </div>
                </div>

            </div>

            <!-- ACESSOS RÁPIDOS -->
            <div class="row mb-4">

                <div class="col-md-3 mb-3">
                    <a href="{{ url('/equipamento/create') }}" class="btn btn-outline-primary w-100 py-3">
                        <i class="bi bi-plus-circle me-2"></i>
                        Novo Equipamento
                    </a>
                </div>

                <div class="col-md-3 mb-3">
                    <a href="{{ url('/categoria/create') }}" class="btn btn-outline-primary w-100 py-3">
                        <i class="bi bi-plus-circle me-2"></i>
                        Nova Categoria
                    </a>
                </div>

                <div class="col-md-3 mb-3">
                    <a href="{{ url('/loja/create') }}" class="btn btn-outline-primary w-100 py-3">
                        <i class="bi bi-plus-circle me-2"></i>
                        Nova Loja
                    </a>
                </div>

                <div class="col-md-3 mb-3">
                    <a href="{{ url('/user/create') }}" class="btn btn-outline-primary w-100 py-3">
                        <i class="bi bi-person-plus me-2"></i>
                        Novo Usuário
                    </a>
                </div>

            </div>

            <!-- GRÁFICOS -->
            <div class="row">

                <div class="col-lg-4 mb-4">
                    <div class="card card-dashboard p-4">
                        <h5>Status dos Equipamentos</h5>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>

            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctxPie = document.getElementById('pieChart');
    
    if (ctxPie) {
        new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: ['Disponíveis', 'Indisponíveis', 'Manutenção'],
                datasets: [{
                    data: [
                        {{ $totalDisponiveis ?? 0 }}, 
                        {{ $totalIndisponiveis ?? 0 }}, 
                        {{ $totalManutencao ?? 0 }}
                    ],
                    backgroundColor: ['#198754', '#dc3545', '#ffc107']
                }]
            },
            options: {
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    }
});
</script>
@endsection