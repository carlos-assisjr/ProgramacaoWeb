@extends('site.layout')
@section('conteudo')
<!-- Custom Styling for the Admin Dashboard -->
<style>
    .admin-wrapper {
        margin-top: -24px;
        margin-bottom: -48px;
    }
    /* Modernized Sidebar */
    .sidebar {
        background-color: #0f172a; /* Slate 900 */
        color: #f8fafc;
        border-right: 1px solid rgba(255, 255, 255, 0.05);
        padding: 24px 16px !important;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* Sticky sidebar height adjustment */
        min-height: calc(100vh - 80px); 
        position: sticky;
        top: 80px;
        z-index: 100;
    }
    .sidebar-title {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #94a3b8; /* Slate 400 */
        font-weight: 700;
        margin-bottom: 20px;
        padding-left: 12px;
    }
    .sidebar .nav-link {
        color: #94a3b8;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: all 0.25s ease;
    }
    .sidebar .nav-link i {
        font-size: 18px;
        transition: transform 0.25s ease;
    }
    .sidebar .nav-link:hover {
        color: #ffffff;
        background-color: rgba(255, 255, 255, 0.05);
    }
    .sidebar .nav-link:hover i {
        transform: translateX(2px);
    }
    .sidebar .nav-link.active {
        color: #ffffff;
        background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
    }
    /* Premium Metric Cards */
    .metric-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.01);
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        overflow: hidden;
    }
    .metric-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.01);
        border-color: rgba(79, 70, 229, 0.1);
    }
    .metric-info h6 {
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
        margin-bottom: 8px;
    }
    .metric-info h3 {
        font-size: 28px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 0;
    }
    .metric-icon-box {
        width: 54px;
        height: 54px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }
    .bg-icon-primary {
        background-color: rgba(79, 70, 229, 0.08);
        color: #4f46e5;
    }
    .bg-icon-success {
        background-color: rgba(16, 185, 129, 0.08);
        color: #10b981;
    }
    .bg-icon-warning {
        background-color: rgba(245, 158, 11, 0.08);
        color: #f59e0b;
    }
    /* Quick Action Buttons */
    .action-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 16px;
        color: #0f172a;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.01);
    }
    .action-card:hover {
        background-color: rgba(79, 70, 229, 0.02);
        border-color: #4f46e5;
        color: #4f46e5 !important;
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.08);
    }
    .action-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background-color: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: #64748b;
        transition: all 0.25s ease;
    }
    .action-card:hover .action-icon {
        background-color: #4f46e5;
        color: #ffffff;
    }
    /* Content Cards */
    .dashboard-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
        height: 100%;
    }
    /* Recent Rentals Table Styling */
    .table-custom {
        margin-bottom: 0;
    }
    .table-custom th {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
        border-bottom-width: 1px;
        padding: 12px 16px;
    }
    .table-custom td {
        padding: 16px;
        font-size: 14px;
        color: #334155;
        vertical-align: middle;
    }
    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .status-badge-active {
        background-color: #ecfdf5;
        color: #065f46;
    }
    .status-badge-pending {
        background-color: #fffbeb;
        color: #92400e;
    }
    /* Adjust main content positioning */
    .main-content {
        padding: 40px 32px !important;
    }
    @media (max-width: 767.98px) {
        .sidebar {
            min-height: auto;
            position: relative;
            top: 0;
            padding: 16px !important;
        }
        .main-content {
            padding: 24px 16px !important;
        }
    }
</style>
<div class="container-fluid admin-wrapper">
    <div class="row">
        <!-- SIDEBAR -->
        <nav class="col-md-3 col-lg-2 sidebar">
            <div>
                <div class="sidebar-title">Navegação</div>
                <ul class="nav flex-column gap-2">
                    <li class="nav-item">
                        <a href="{{ url('/dashboard.adm') }}" class="nav-link active">
                            <i class="bi bi-speedometer2"></i>
                            Visão Geral
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/categoria') }}" class="nav-link">
                            <i class="bi bi-tags"></i>
                            Categorias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/loja') }}" class="nav-link">
                            <i class="bi bi-shop"></i>
                            Lojas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/equipamento') }}" class="nav-link">
                            <i class="bi bi-tools"></i>
                            Equipamentos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/user') }}" class="nav-link">
                            <i class="bi bi-people"></i>
                            Usuários
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/aluguel') }}" class="nav-link">
                            <i class="bi bi-calendar-check"></i>
                            Aluguéis
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar Footer / Logout -->
            <div class="pt-4 border-top border-secondary border-opacity-10 mt-4">
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100 py-2 rounded-3 border-opacity-50">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        Sair
                    </button>
                </form>
            </div>
        </nav>
        <!-- CONTEÚDO PRINCIPAL -->
        <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
            <!-- Welcome Header Section -->
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 pb-3 border-bottom border-secondary border-opacity-10 gap-3">
                <div>
                    <h1 class="h3 fw-800 text-slate-900 mb-1" style="font-weight: 800; letter-spacing: -0.5px;">
                        Olá, {{ auth()->user()->name }}
                    </h1>
                    <p class="text-muted mb-0 small">
                        Painel de Controle do Sistema de Aluguel de Equipamentos
                    </p>
                </div>
                <div class="badge bg-light text-secondary border px-3 py-2 rounded-pill font-weight-600">
                    <i class="bi bi-calendar3 me-2 text-primary"></i>
                    {{ date('d/m/Y') }}
                </div>
            </div>
            <!-- METRIC CARDS -->
            <div class="row g-4 mb-4">
                <!-- Card 1 -->
                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="metric-card">
                        <div class="metric-info">
                            <h6>Total de Clientes</h6>
                            <h3>{{ $totalClientes ?? 0 }}</h3>
                        </div>
                        <div class="metric-icon-box bg-icon-primary">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="metric-card">
                        <div class="metric-info">
                            <h6>Equipamentos</h6>
                            <h3>{{ $totalEquipamentos ?? 0 }}</h3>
                        </div>
                        <div class="metric-icon-box bg-icon-success">
                            <i class="bi bi-tools"></i>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="metric-card">
                        <div class="metric-info">
                            <h6>Aluguéis Realizados</h6>
                            <h3>{{ $totalAlugueis ?? 0 }}</h3>
                        </div>
                        <div class="metric-icon-box bg-icon-warning">
                            <i class="bi bi-calendar-check-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- QUICK ACTIONS SECTION -->
            <div class="mb-4">
                <h5 class="fw-bold mb-3" style="font-size: 16px;">Ações Rápidas</h5>
                <div class="row g-3">
                    <div class="col-6 col-md-3">
                        <a href="{{ url('/equipamento/create') }}" class="action-card">
                            <div class="action-icon">
                                <i class="bi bi-plus-lg"></i>
                            </div>
                            <span>Equipamento</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="{{ url('/categoria/create') }}" class="action-card">
                            <div class="action-icon">
                                <i class="bi bi-tags"></i>
                            </div>
                            <span>Categoria</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="{{ url('/loja/create') }}" class="action-card">
                            <div class="action-icon">
                                <i class="bi bi-shop"></i>
                            </div>
                            <span>Nova Loja</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="{{ url('/user/create') }}" class="action-card">
                            <div class="action-icon">
                                <i class="bi bi-person-plus"></i>
                            </div>
                            <span>Novo Usuário</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ANALYTICS & ACTIVITY SECTION -->
            <div class="row g-4">
                <!-- Doughnut Chart for Equipment Status -->
                <div class="col-12 col-lg-5 col-xl-4">
                    <div class="dashboard-card d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="fw-bold mb-1" style="font-size: 16px;">Status dos Equipamentos</h5>
                            <p class="text-muted small mb-4">Distribuição de frota em tempo real</p>
                        </div>
                        <div class="position-relative py-3 mx-auto" style="max-width: 220px; width: 100%;">
                            <canvas id="pieChart"></canvas>
                        </div>
                        <div class="mt-4 pt-3 border-top d-flex justify-content-around text-center small text-muted">
                            <div>
                                <span class="d-block fw-bold text-success">{{ $totalDisponiveis ?? 0 }}</span>
                                Disponíveis
                            </div>
                            <div class="vr"></div>
                            <div>
                                <span class="d-block fw-bold text-danger">{{ $totalIndisponiveis ?? 0 }}</span>
                                Alugados
                            </div>
                            <div class="vr"></div>
                            <div>
                                <span class="d-block fw-bold text-warning">{{ $totalManutencao ?? 0 }}</span>
                                Manutenção
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Recent Activity / Rentals Log (Adding richness and simplification) -->
                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h5 class="fw-bold mb-1" style="font-size: 16px;">Aluguéis Recentes</h5>
                                <p class="text-muted small mb-0">Últimas transações realizadas no sistema</p>
                            </div>
                            <a href="{{ url('/aluguel') }}" class="btn btn-link btn-sm text-decoration-none fw-600 p-0 text-primary">Ver todos</a>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-custom align-middle">
                                <thead>
                                    <tr>
                                        <th>Equipamento</th>
                                        <th>Cliente</th>
                                        <th>Data Início</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Chart Setup Script -->
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
                        {{ $totalDisponiveis ?? 15 }}, 
                        {{ $totalIndisponiveis ?? 7 }}, 
                        {{ $totalManutencao ?? 3 }}
                    ],
                    backgroundColor: ['#10b981', '#ef4444', '#f59e0b'],
                    borderWidth: 2,
                    borderColor: '#ffffff',
                    hoverOffset: 4
                }]
            },
            options: {
                cutout: '72%',
                plugins: {
                    legend: { display: false } // Hidden legend since custom tags are used below chart
                },
                maintainAspectRatio: false
            }
        });
    }
});
</script>
@endsection
