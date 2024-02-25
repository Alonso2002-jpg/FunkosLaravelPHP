@php use App\Models\Category; @endphp
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
    <form class="row gy-2 gx-3 align-items-center" method="post" action="{{route("categories.update", $category->id)}}">
        @csrf
        @method('PUT')
        <div class="col-12 text-center bg-dark text-light">
            <h2>Actualizar una Categoria</h2>
        </div>
        <div class="col-12 text-center bg-secondary">
            <h3 class="text-light">Complete los datos</h3>
        </div>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-text">Nombre</div>
                <input type="text" class="form-control" value="{{ $category->nameCategory }}" id="name" placeholder="Nombre de la Categoria" name="name">
            </div>
        </div>
        <span class="col-2"></span>
        <div class="col-2">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="deleted" name="deleted" autocomplete="off" {{ $category->isDeleted ? 'checked' : '' }}>
                <label class="btn btn-outline-danger" for="deleted">Eliminado?</label>
            </div>
        </div>
        <div class="col-12 mt-5 row">
            <button type="submit" class="btn btn-primary col-4">Actualizar</button>
            <div class="col-4"></div>
            <a href="{{ route('categories.gestion')}}" class="btn btn-secondary col-4">Volver</a>
        </div>
    </form>
</div>
@endsection
