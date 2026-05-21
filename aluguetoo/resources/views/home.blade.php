<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AlugueToo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">
    <h1>Equipamentos Disponíveis</h1>

    @if($equipamentos->isEmpty())
        <p class="text-muted">Nenhum equipamento disponível no momento.</p>
    @else
        <div class="row">
            @foreach($equipamentos as $eq)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">

                        @if($eq->foto)
                            <img src="{{ asset('storage/' . $eq->foto) }}"
                                 class="card-img-top"
                                 alt="{{ $eq->nome }}"
                                 style="height: 250px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/300x250"
                                 class="card-img-top"
                                 alt="Sem imagem">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $eq->nome }}</h5>

                            <p class="card-text">
                                Marca: {{ $eq->marca }}
                            </p>

                            <p class="card-text">
                                {{ $eq->descricao }}
                            </p>

                            <p class="card-text text-success fw-bold">
                                R$ {{ number_format($eq->valor_diaria, 2, ',', '.') }}/dia
                            </p>

                            <p class="card-text">
                                Status: {{ $eq->status }}
                            </p>

                            <form action="/carrinho/add" method="POST">
                                @csrf
                                <input type="hidden" name="equipamento_id" value="{{ $eq->id }}">

                                <button type="submit"
                                        class="btn btn-primary"
                                        {{ $eq->status !== 'DISPONIVEL' ? 'disabled' : '' }}>
                                    Alugar
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>