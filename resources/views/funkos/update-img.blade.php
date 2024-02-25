@php use App\Models\Funko; @endphp
@extends('main')

@section('title', 'Funkos Shop - PlayStore')

@section('content')
<div class="container my-2">
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br/>
    @endif
    <form class="row gy-2 gx-3 align-items-center" action="{{ route('funkos.update-image', $funko->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="col-12 text-center bg-dark text-light">
            <h2>Actualizar Imagen</h2>
        </div>
        <div class="col-12 text-center bg-secondary">
            <h3 class="text-light">Datos</h3>
        </div>
        <div class="col-12 my-3">
            <div class="input-group">
                <div class="input-group-text">Nombre</div>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre del Funko" value="{{$funko->name}}" disabled>
            </div>
        </div>

        <div class="col-4">
            <p class="font-monospace">Imagen</p>
            @if($funko->img != Funko::$IMAGE_DEFAULT)
                <img class="card-img-top" src="{{ asset('storage/' . $funko->img) }}" style="height: 200px; object-fit: cover;">
            @else
                <img class="card-img-top" src="{{ Funko::$IMAGE_DEFAULT }}" style="height: 200px; object-fit: cover;">
            @endif
        </div>
        <div class="col-4 text-center bg-secondary">

        </div>
        <div class="col-4 mb-3">
            <input class="form-control" type="file" id="img" required name="img">
        </div>
        <div class="col-12 mt-5 row">
            <button type="submit" class="btn btn-primary col-4">Actualizar</button>
            <div class="col-4"></div>
            <a type="reset" class="btn btn-secondary col-4" href="{{ route('funkos.gestion')}}">Volver</a>
        </div>
    </form>
</div>
@endsection
