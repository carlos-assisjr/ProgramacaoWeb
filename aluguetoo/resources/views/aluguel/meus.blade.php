@extends('site.layout')

@section('conteudo')
<main class="dashboard-container">
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Meus Aluguéis</h1>

        <a href="{{ url('/') }}" class="btn btn-primary">
            Ver equipamentos
        </a>
    </div>

    @forelse($alugueis as $aluguel)

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header d-flex justify-content-between align-items-center bg-white">

                <div>
                    <strong>Aluguel #{{ $aluguel->id }}</strong>
                    <br>

                    <small class="text-muted">
                        Data do pedido:
                        {{ $aluguel->created_at ? $aluguel->created_at->format('d/m/Y H:i') : '-' }}
                    </small>
                </div>

                <span class="badge
                    @if($aluguel->status == 'RESERVADO') bg-primary
                    @elseif($aluguel->status == 'RETIRADO') bg-warning text-dark
                    @elseif($aluguel->status == 'DEVOLVIDO') bg-success
                    @elseif($aluguel->status == 'ATRASADO') bg-danger
                    @else bg-secondary
                    @endif">
                    {{ $aluguel->status }}
                </span>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>Foto</th>
                                <th>Equipamento</th>
                                <th>Valor Diária</th>
                                <th>Data Início</th>
                                <th>Data Fim Prevista</th>
                                <th>Data Devolução</th>
                                <th>Ação</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($aluguel->itens as $item)

                                <tr>
                                    <td width="90">
                                        @if($item->equipamento && $item->equipamento->foto)
                                            <img src="{{ asset('storage/' . $item->equipamento->foto) }}"
                                                 width="70"
                                                 height="70"
                                                 style="object-fit: cover;"
                                                 class="rounded"
                                                 alt="{{ $item->equipamento->nome }}">
                                        @else
                                            <span class="text-muted">Sem foto</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $item->equipamento->nome ?? 'Equipamento removido' }}
                                    </td>

                                    <td>
                                        R$ {{ number_format($item->valor_diaria_contratada, 2, ',', '.') }}
                                    </td>

                                    <td>
                                        {{ $item->data_inicio ? date('d/m/Y', strtotime($item->data_inicio)) : '-' }}
                                    </td>

                                    <td>
                                        {{ $item->data_fim_prevista ? date('d/m/Y', strtotime($item->data_fim_prevista)) : '-' }}
                                    </td>

                                    <td>
                                        {{ $item->data_devolucao ? date('d/m/Y H:i', strtotime($item->data_devolucao)) : '-' }}
                                    </td>

                                    <td>
                                        @if($item->data_devolucao)

                                            <span class="badge bg-success">
                                                Devolvido
                                            </span>

                                        @elseif(in_array($aluguel->status, ['RETIRADO', 'ATRASADO']))

                                            <form action="{{ url('/meus-alugueis/item/' . $item->id . '/devolver') }}"
                                                  method="POST">

                                                @csrf

                                                <button type="submit"
                                                        class="btn btn-sm btn-success"
                                                        onclick="return confirm('Deseja devolver este equipamento agora?')">
                                                    Devolver antecipado
                                                </button>

                                            </form>

                                        @else

                                            <span class="badge bg-secondary">
                                                {{ $aluguel->status }}
                                            </span>

                                        @endif
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7" class="text-center text-muted">
                                        Nenhum item neste aluguel.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    @empty

        <div class="alert alert-info">
            Você ainda não possui aluguéis.
        </div>

        <a href="{{ url('/') }}" class="btn btn-primary">
            Ver equipamentos
        </a>

    @endforelse

</div>

</main>
@endsection