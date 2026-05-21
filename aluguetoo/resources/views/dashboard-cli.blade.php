@extends('layout')

@section('conteudo')

<h1>Meu carrinho de locação</h1>

@if(!$aluguel || $aluguel->itens->isEmpty())
    <p class="text-danger">Seu carrinho está vazio!</p>
@else
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Equipamento</th>
                <th>Marca</th>
                <th>Valor diária</th>
                <th>Data início</th>
                <th>Data fim prevista</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            @foreach($aluguel->itens as $item)
                <tr>
                    <td>{{ $item->equipamento->nome }}</td>
                    <td>{{ $item->equipamento->marca }}</td>
                    <td>R$ {{ number_format($item->valor_diaria_contratada, 2, ',', '.') }}</td>
                    <td>{{ $item->data_inicio }}</td>
                    <td>{{ $item->data_fim_prevista }}</td>
                    <td>
                        <form action="/carrinho/remove" method="post">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-danger">
                                Remover
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="/carrinho/fechar" method="post">
        @csrf
        <input type="hidden" name="aluguel_id" value="{{ $aluguel->id }}">
        <button type="submit" class="btn btn-warning">
            Fechar locação
        </button>
    </form>
@endif

@endsection