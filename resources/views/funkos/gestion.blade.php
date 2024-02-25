@php use App\Models\Funko; @endphp

@extends('main')

@section('title', 'Funkos Shop - PlayStore')

@section('content')
<div class="container-fluid p-4 w-100">
    <div class="mx-5">
        <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Gestion de Funkos</h1>
    <p class="mb-4">Gestione los Funkos dentro del Sistema.</p>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow m-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-danger fs-4">Funkos</h6>
            <a class="btn btn-outline-warning" href="{{ route('funkos.create') }}">
                Crear Funko
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(count($funkos) > 0)
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Categoria</th>
                        <th>Gestionar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($funkos as $funko)
                    <tr>
                        <td class="text-xl-center fs-5">{{ $funko->name }}</td>
                        <td class="text-success">{{ $funko->price }}</td>
                        <td>{{ $funko->quantity }}</td>
                        <td>{{ $funko->category->nameCategory }}</td>
                        <td>
                            @if($funko->img != Funko::$IMAGE_DEFAULT)
                                <img class="img-default" src="{{ asset('storage/' . $funko->img) }}" style="height: 200px; object-fit: cover;">
                            @else
                                <img class="card-img-top" src="{{ Funko::$IMAGE_DEFAULT }}" style="height: 200px; object-fit: cover;">
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('funkos.destroy', $funko->id) }}" method="POST"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                Eliminar
                            </button>
                            </form>
                            <a class="btn btn-info btn-circle btn-sm" href="{{ route('funkos.edit', $funko->id) }}">
                                Actualizar
                            </a>
                            <a class="btn btn-primary btn-circle btn-sm" href="{{ route('funkos.edit-image', $funko->id) }}">
                                Imagen
                            </a>
                            <a class="btn btn-success btn-circle btn-sm" href="{{ route('funkos.show', $funko->id) }}">
                                Detalles
                            </a>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                    <div class="pagination-container">
                        {{ $funkos->links('pagination::bootstrap-4') }}
                    </div>
                @else
                    <div class="container text-center">
                        <h4>No hay Funkos Actualmente</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
