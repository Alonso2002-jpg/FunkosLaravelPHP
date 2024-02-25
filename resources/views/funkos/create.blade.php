@php use App\Models\Funko; @endphp

@extends('main')

@section('title', 'Funkos Shop - PlayStore')

@section('content')
<div class="container my-2">
    <form class="row gy-2 gx-3 align-items-center" method="post" action="{{ route('funkos.store') }}">
        @csrf
        <div class="col-12 text-center bg-dark text-light">
            <h2>Crear un nuevo Funko</h2>
        </div>
        <div class="col-12 text-center bg-secondary">
            <h3 class="text-light">Complete los datos</h3>
        </div>
        <div class="col-6">
            <div class="input-group">
                <div class="input-group-text">Nombre</div>
                <input type="text" class="form-control" id="name" placeholder="Nombre del Funko" name="name">
            </div>
        </div>
        <div class="col-6">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Coloque una descripcion" id="description" name="description"></textarea>
                <label for="floatingTextarea">Descripcion</label>
            </div>
        </div>
        <div class="col-6 my-3">
            <div class="input-group">
                <div class="input-group-text">Precio</div>
                <input type="number" class="form-control" id="price" name="price" placeholder="Precio Unitario" step="any">
            </div>
        </div>
        <div class="col-6 my-3">
            <div class="input-group">
                <div class="input-group-text">Cantidad</div>
                <input type="number" class="form-control" id="quantity" placeholder="Cantidad" name="quantity">
            </div>
        </div>

        <div class="col-4">
            <p class="font-monospace">Categoria</p>
            <select class="form-select w-100" aria-label="select example" id="category" name="category">
                <option value="" selected>Elija una categoria</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nameCategory }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-8">

        </div>
        <div class="col-12 mt-5 row">
            <button type="submit" class="btn btn-primary col-3 me-5">Crear</button>
            <button type="reset" class="btn btn-danger col-3 me-5">Reset</button>
            <a href="{{ route('funkos.gestion')}}" class="btn btn-secondary col-3 me-5">Volver</a>
        </div>
    </form>
</div>
@endsection
