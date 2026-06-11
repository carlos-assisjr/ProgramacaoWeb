@extends('site.layout')

@section('conteudo')

<div class="container py-5">

    <h1 class="mb-4 fw-bold">Meu Carrinho</h1>

    @if(isset($aluguel) && $aluguel && $aluguel->itens->count() > 0)

        <form id="formDatas" action="{{ url('/carrinho/atualizar-datas') }}" method="POST">
            @csrf
        </form>

        <div class="table-responsive">
            <table class="table table-bordered bg-white align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Foto</th>
                        <th>Equipamento</th>
                        <th>Valor diária</th>
                        <th>Data início</th>
                        <th>Data final prevista</th>
                        <th width="120">Ação</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($aluguel->itens as $item)
                        <tr>
                            <td width="90">
                                @if($item->equipamento && $item->equipamento->foto)
                                    <img src="{{ asset('storage/' . $item->equipamento->foto) }}"
                                         width="70"
                                         height="70"
                                         style="object-fit: cover;"
                                         class="rounded">
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
                                <input type="date"
                                       name="datas[{{ $item->id }}]"
                                       form="formDatas"
                                       class="form-control"
                                       min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                       value="{{ $item->data_fim_prevista ? date('Y-m-d', strtotime($item->data_fim_prevista)) : '' }}"
                                       required>
                            </td>

                            <td>
                                <form action="{{ url('/carrinho/remover/' . $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Remover este item?')">
                                        Remover
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" form="formDatas" class="btn btn-primary">
                Salvar datas
            </button>

            <form action="{{ url('/carrinho/finalizar') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-success">
                    Finalizar Aluguel
                </button>
            </form>
        </div>

    @else

        <div class="alert alert-info">
            Seu carrinho está vazio.
        </div>

        <a href="{{ url('/') }}" class="btn btn-primary">
            Ver equipamentos
        </a>

    @endif

</div>

@endsection