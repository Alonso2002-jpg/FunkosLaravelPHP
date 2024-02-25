@php use App\Models\Funko; @endphp

@extends('main')

@section('title', 'Funkos Shop - PlayStore')

@section('content')
<div class="container my-2">
    <form class="row gy-2 gx-3 align-items-center" action="{{route('funkos.update', $funko->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="col-12 text-center bg-dark text-light">
            <h2>Actualizar Funkos</h2>
        </div>
        <div class="col-12 text-center bg-secondary">
            <h3 class="text-light">Datos</h3>
        </div>
        <div class="col-6 my-3">
            <div class="input-group">
                <div class="input-group-text">Nombre</div>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre del Funko" value="{{$funko->name}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Coloque una descripcion" id="description" name="description">{{$funko->description}}</textarea>
                <label for="floatingTextarea">Descripcion</label>
            </div>
        </div>
        <div class="col-6 my-3">
            <div class="input-group">
                <div class="input-group-text">Precio</div>
                <input type="number" name="price" class="form-control" step="any" id="price" placeholder="Precio Unitario" value="{{$funko->price}}">
            </div>
        </div>
        <div class="col-6 my-3">
            <div class="input-group">
                <div class="input-group-text">Cantidad</div>
                <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Cantidad" value="{{$funko->quantity}}">
            </div>
        </div>

        <div class="col-4">
            <p class="font-monospace">Categoria</p>
            <select class="form-select w-100" aria-label="select example" id="category" name="category">
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{$funko->category_id == $category->id ? 'selected' : ''}}> {{$category->nameCategory}} </option>
                @endforeach
            </select>
        </div>
        <div class="col-8">

        </div>
        <div class="col-12 mt-5 row">
            <button type="submit" class="btn btn-primary col-4">Enviar</button>
            <div class="col-4"></div>
            <a type="reset" class="btn btn-secondary col-4" href="{{route('funkos.gestion')}}">Cancelar</a>
        </div>
    </form>
</div>
@endsection
