<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema Laravel</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body { background-color: #f4f7f6; font-family: 'Inter', sans-serif; }
        .sidebar { min-height: 100vh; background: #212529; color: white; }
        .nav-link { color: rgba(255,255,255,0.7); }
        .nav-link:hover, .nav-link.active { color: white; background: rgba(255,255,255,0.1); }
        .card { border: none; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="d-flex align-items-center mb-4 text-white text-decoration-none">
                <span class="fs-4 fw-bold">AdminPanel</span>
            </div>
            <ul class="nav flex-column gap-2">
                <li class="nav-item"><a href="#" class="nav-link active"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-people me-2"></i> Usuários</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-bar-chart me-2"></i> Relatórios</a></li>
            </ul>
            <hr>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100 mt-4">
                    <i class="bi bi-box-arrow-right me-2"></i> Sair
                </button>
            </form>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Bem-vindo, {{ Auth::user()->name }}!</h1>
                <div class="text-muted">{{ date('d/m/Y') }}</div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card p-3 bg-primary text-white">
                        <h6>Vendas Mensais</h6>
                        <h3>R$ 12.450,00</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 bg-success text-white">
                        <h6>Novos Clientes</h6>
                        <h3>+ 48</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 bg-warning text-dark">
                        <h6>Pendências</h6>
                        <h3>12</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card p-4 mb-4">
                        <h5 class="card-title">Crescimento de Receita</h5>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card p-4 mb-4">
                        <h5 class="card-title">Distribuição de Vendas</h5>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Gráfico de Linha (Mock)
    const ctxLine = document.getElementById('lineChart');
    new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
            datasets: [{
                label: 'Receita 2026',
                data: [12000, 19000, 15000, 25000, 22000, 30000],
                borderColor: '#0d6efd',
                tension: 0.3,
                fill: true,
                backgroundColor: 'rgba(13, 110, 253, 0.1)'
            }]
        }
    });

    // Gráfico de Pizza (Mock)
    const ctxPie = document.getElementById('pieChart');
    new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: ['Eletrônicos', 'Moda', 'Serviços'],
            datasets: [{
                data: [55, 25, 20],
                backgroundColor: ['#0d6efd', '#198754', '#ffc107']
            }]
        },
        options: { plugins: { legend: { position: 'bottom' } } }
    });
</script>

</body>
</html>