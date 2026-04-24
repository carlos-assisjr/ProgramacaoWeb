<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Loja Online</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
  <h1 class="text-center mb-4">Produtos</h1>

  <div class="row g-4">

    @if($produtos->isEmpty())
        <p class="text-danger">Nenhum produto disponível!</p>
    @else
        @foreach($produtos as $p)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                        <h5 class="card-title">{{ $p->nome }}</h5>
                        <p class="card-text text-success fw-bold">R$ {{ $p->preco}}</p>
                        <p class="card-text">Estoque: {{$p->estoque}}</p>
                    </div>
                    <div class="card-footer">
                        <form action="/carrinho/add" method="POST">
                            @CSRF
                            <input type="hidden" name="produto_id" value="{{$p->id}}">
                            <button type="submit" class="btn btn-primary">
                                Adicionar ao carrinho</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

  </div>
</div>

</body>
</html>