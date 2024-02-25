@php use App\Models\Funko; @endphp

@extends('main')

@section('title', 'Funkos Shop - PlayStore')

@section('content')
<div class="container-fluid p-4 w-100">
    <div class="card">
        <div class="container-fliud">
            <a type="button" class="btn-close col-md-12 ms-3 mt-3" href="{{ route('funkos.index') }}"></a>
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="preview-pic tab-content">
                        <div class="tab-pane active m-auto pt-5" id="pic-1" style="height: 350px; width: 350px; object-fit: cover;">
                            @if($funko->img != Funko::$IMAGE_DEFAULT)
                                <img src="{{ asset('storage/' . $funko->img) }}" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ Funko::$IMAGE_DEFAULT }}" style="height: 200px; object-fit: cover;">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="details col-md-6 m-auto">
                    <h3 class="product-title text-primary">{{$funko->name}}</h3>
                    <h4 class="price my-2">Precio: <span class="text-success">${{$funko->price}}</span></h4>
                    <p class="fs-5 my-2"><strong>Date prisa!</strong> Solo nos quedan <strong>{{$funko->quantity}} unidades!!</strong></p>
                    <h5 class="sizes my-2">CATEGORIA: <span class="text-warning">{{$funko->category->nameCategory}}</span></h5>
                    <div class="action mt-4">
                        <button class="add-to-cart btn btn-secondary w-100" type="button">Añadir al carrito!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
