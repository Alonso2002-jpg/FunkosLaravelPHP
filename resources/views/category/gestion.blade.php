@php use App\Models\Category; @endphp
@extends('main')

@section('title', 'Funkos Shop - PlayStore')

@section('content')
<div class="container-fluid p-4 w-100">
    <div class="mx-5">
        <h1 class="h3 mb-2 text-gray-800">Gestion de Categorias</h1>
        <p class="mb-4">Gestione las Categorias dentro del Sistema.</p>
    </div>

    <div class="card shadow m-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary fs-4">Categorias</h6>
            <a class="btn btn-outline-warning" href="{{ route('categories.create') }}">
                Crear Categoria
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de Categoria</th>
                        <th>Estado</th>
                        <th>Gestionar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td class="text-xl-center">{{ $category->id }}</td>
                        <td class="text-success">{{ $category->nameCategory }}</td>
                        <td class="bg-{{ $category->isDeleted ? 'danger-subtle' : 'success-subtle' }} text-center">{{ $category->isDeleted ? 'Eliminado' : 'Activo' }}</td>
                        <td>
                            <a class="btn btn-primary btn-circle btn-sm"
                                    href="{{ route('categories.edit', $category->id) }}">
                                Actualizar
                            </a>
                                @if(!$category->isDeleted)
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                        Eliminar
                                    </button>
                                @else
                            <form action="{{ route('categories.restore', $category->id) }}" method="POST"
                                              style="display: inline;">
                                     @csrf
                                     @method('DELETE')
                                    <button type="submit" class="btn btn-success btn-circle btn-sm">
                                        Restaurar
                                    </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
