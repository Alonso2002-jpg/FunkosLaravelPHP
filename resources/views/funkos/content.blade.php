@php use App\Models\Funko; @endphp

@extends('main')

@section('title', 'Funkos Shop - PlayStore')

@section('content')
    <div class="container">
        @if(!empty($error))
        <div class="alert alert-warning alert-dismissible fade show col-12 my-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="d-sm-flex align-items-center justify-content-between m-4 row">
            @if(isset($nameCate) && !empty($nameCate))
                @if($nameCate != 'SIN CATEGORIA')
                    <h1 class="h3 mb-0 text-gray-800 col-8">
                        Conozca los mejores Funkos de {{$nameCate}}
                    </h1>
                @else
                    <h1 class="h3 mb-0 text-gray-800 col-8">
                        Funkos Sin Categoria
                    </h1>
                @endif
            @else
                <h1 class="h3 mb-0 text-gray-800 col-8">
                    Conozca los mejores Funkos del Mercado
                </h1>
            @endif
            <form
                action="{{ route('funkos.index') }}"
                class="d-none col-4 d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                id="form-name"
                method="get">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por nombre..."
                           aria-label="search" id="search" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            @if(count($funkos) > 0)
                @foreach($funkos as $funko)
                        <div class="col-3 my-2">
                            <div class="card border-primary">
                                @if($funko->img != Funko::$IMAGE_DEFAULT)
                                    <img class="card-img-top" src="{{ asset('storage/' . $funko->img) }}" style="height: 200px; object-fit: cover;">
                                @else
                                    <img class="card-img-top" src="{{ Funko::$IMAGE_DEFAULT }}" style="height: 200px; object-fit: cover;">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title text-primary">{{ $funko->name }}</h5>
                                    <p class="card-text text-success">{{ $funko->price }}</p>
                                    <a href="{{ route('funkos.show', $funko->id) }}" class="btn btn-secondary">Añadir al carrito</a>
                                </div>
                            </div>
                        </div>
                @endforeach
            @else
                <div class="container text-center">
                    <h4>No hay Funkos Actualmente</h4>
                </div>
            @endif
        </div>
        <div class="pagination-container">
            {{ $funkos->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
