@extends('site.layout')

@section('conteudo')

<div id="carouselCatalogo"
    class="carousel slide carousel-fade"
    data-bs-ride="carousel">

    <div class="carousel-indicators">
        <button type="button"
            data-bs-target="#carouselCatalogo"
            data-bs-slide-to="0"
            class="active">
        </button>

        <button type="button"
            data-bs-target="#carouselCatalogo"
            data-bs-slide-to="1">
        </button>

        <button type="button"
            data-bs-target="#carouselCatalogo"
            data-bs-slide-to="2">
        </button>
    </div>

    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="{{ asset('img/banner1.jpg') }}"
                class="carousel-img"
                alt="Banner 1">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('img/banner2.jpg') }}"
                class="carousel-img"
                alt="Banner 2">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('img/banner3.jpg') }}"
                class="carousel-img"
                alt="Banner 3">
        </div>

    </div>

    <button class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselCatalogo"
        data-bs-slide="prev">

        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next"
        type="button"
        data-bs-target="#carouselCatalogo"
        data-bs-slide="next">

        <span class="carousel-control-next-icon"></span>
    </button>

</div>

<div class="container py-5">

    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-bold text-start">
                EQUIPAMENTOS DISPONÍVEIS
            </h4>
        </div>
    </div>

    <div class="row">

        @forelse($equipamentos as $e)

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

            <div class="card h-100 shadow-sm border-0 transition-hover">

                <div class="position-relative">

                    @if($e->foto)
                    <img src="{{ asset('storage/' . $e->foto) }}"
                        class="card-img-top"
                        style="height: 220px; object-fit: cover;"
                        alt="{{ $e->nome }}">
                    @else
                    <img src="https://via.placeholder.com/300x200?text=Sem+Foto"
                        class="card-img-top"
                        style="height: 220px; object-fit: cover;"
                        alt="Sem foto">
                    @endif

                    @if($e->status !== 'DISPONIVEL')
                    <span class="badge bg-danger position-absolute top-0 end-0 m-2">
                        Indisponível
                    </span>
                    @endif

                </div>

                <div class="card-body d-flex flex-column text-center">

                    <h5 class="card-title fw-bold text-dark mb-2">
                        {{ $e->nome }}
                    </h5>

                    <p class="text-muted small mb-1">
                        {{ $e->marca }}
                    </p>

                    <p class="card-text text-muted small flex-grow-1">
                        {{ Str::limit($e->descricao, 60) }}
                    </p>

                    <div class="mt-auto">

                        <h4 class="text-success fw-bold">
                            R$ {{ number_format($e->valor_diaria, 2, ',', '.') }}
                        </h4>

                        <p class="text-muted small">
                            por diária
                        </p>

                        @auth

                        @if(auth()->user()->role === 'CLI')

                        <form action="{{ url('/carrinho/adicionar') }}" method="POST">
                            @csrf

                            <input type="hidden"
                                name="equipamento_id"
                                value="{{ $e->id }}">

                            <button type="submit"
                                class="btn btn-primary w-100 rounded-pill py-2 shadow-sm"
                                {{ $e->status !== 'DISPONIVEL' ? 'disabled' : '' }}>

                                <i class="bi bi-cart-plus-fill me-2"></i>
                                Adicionar ao Carrinho

                            </button>
                        </form>


                        @elseif(auth()->user()->role === 'ADM')

                        <a href="{{ url('/equipamento/' . $e->id . '/edit') }}"
                            class="btn btn-warning w-100 rounded-pill py-2 shadow-sm">

                            Editar Equipamento

                        </a>

                        @endif

                        @else

                        <a href="{{ url('/login') }}"
                            class="btn btn-primary w-100 rounded-pill py-2 shadow-sm">

                            Entrar para Alugar

                        </a>

                        @endauth

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12 text-center py-5">
            <h4 class="text-muted">
                Nenhum equipamento disponível no momento.
            </h4>
        </div>

        @endforelse

    </div>

</div>

@endsection