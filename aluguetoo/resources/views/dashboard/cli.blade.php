@extends('site.layout')
@section('conteudo')
<!-- Custom Styling for the Client Dashboard -->
<style>
    .cli-wrapper {
        margin-top: 12px;
    }

    /* Premium Quick-Action Cards */
    .cli-action-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
        height: 100%;
        color: #0f172a;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.01);
    }

    .cli-action-card:hover {
        transform: translateY(-5px);
        border-color: rgba(79, 70, 229, 0.15);
        box-shadow: 0 20px 25px -5px rgba(79, 70, 229, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        color: #0f172a !important;
    }

    .cli-action-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 16px;
    }

    .cli-action-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        transition: all 0.25s ease;
    }

    .cli-action-card:hover .cli-action-icon {
        background-color: var(--primary) !important;
        color: #ffffff !important;
        transform: scale(1.05);
    }

    .cli-action-btn-text {
        font-size: 13px;
        font-weight: 700;
        color: var(--primary);
        display: flex;
        align-items: center;
        gap: 6px;
        margin-top: 12px;
        transition: gap 0.2s ease;
    }

    .cli-action-card:hover .cli-action-btn-text {
        gap: 10px;
    }

    /* Active Rental Progress Card */
    .rental-progress-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 20px 24px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
    }

    .rental-tool-img {
        width: 64px;
        height: 64px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
    }

    /* Modern Progress Bar */
    .progress-custom {
        height: 6px;
        border-radius: 10px;
        background-color: #f1f5f9;
        overflow: hidden;
    }

    .progress-bar-custom {
        background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
        border-radius: 10px;
    }

    /* Quick Tip/Support Box */
    .support-box {
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.02) 0%, rgba(6, 182, 212, 0.02) 100%);
        border: 1px dashed rgba(79, 70, 229, 0.2);
        border-radius: 16px;
        padding: 24px;
    }
</style>
<div class="container cli-wrapper">
    <!-- Header Section -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5 pb-3 border-bottom gap-3">
        <div>
            <h1 class="fw-800 text-slate-900 mb-1" style="font-weight: 800; letter-spacing: -0.5px;">Área do Cliente</h1>
            <p class="text-muted mb-0">Bem-vindo de volta! Gerencie seus aluguéis e explore novas ferramentas.</p>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-pill px-4 btn-sm fw-600">
            <i class="bi bi-arrow-left me-2"></i>Ir para a Loja
        </a>
    </div>
    <div class="row g-4">
        <!-- Main Actions Grid (Left Column) -->
        <div class="col-12 col-lg-8">
            <h5 class="fw-bold mb-3" style="font-size: 16px;">Painel de Controle</h5>
            <div class="row g-4 mb-5">

                <!-- Action 1: Meus Aluguéis -->
                <div class="col-12 col-sm-6
">
                    <a href="{{ url('/meus-alugueis') }}" class="cli-action-card">
                        <div>
                            <div class="cli-action-header">
                                <div class="cli-action-icon bg-primary bg-opacity-10 text-primary">
                                    <i class="bi bi-calendar2-check-fill"></i>
                                </div>
                                <h5 class="fw-bold mb-0" style="font-size: 16px;">Meus Aluguéis</h5>
                            </div>
                            <p class="text-muted small mb-0">Consulte seus aluguéis em andamento, datas de devolução e histórico de pedidos.</p>
                        </div>
                        <div class="cli-action-btn-text">
                            Acessar Aluguéis <i class="bi bi-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection