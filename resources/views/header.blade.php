<nav class="navbar navbar-expand-lg navbar-light bg-primary-subtle w-100">
    <div class="container">
        <a class="navbar-brand fs-2" href="{{ route('funkos.index') }}">Funkos Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-2">
                <li><p class="m-1 me-4 fs-5 ">Bienvenido {{ auth()->user()->name ?? 'Invitado/a' }}</p></li>
                    <div class="btn-group me-2">
                    <button type="button" class="btn btn-primary">Categorias</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Nuestras Categorias</span>
                    </button>
                    <ul class="dropdown-menu">
                        @if(auth()->check() && auth()->user()->role == 'admin')
                            @foreach($categories as $category)
                                <li><a class="dropdown-item" href="{{ route('funkos.category', $category->id) }}">{{ $category->nameCategory }}</a></li>
                                <li><hr class="dropdown-divider"></li>
                            @endforeach
                        @else
                            @foreach($categories as $category)
                                @if($category->nameCategory != 'SIN CATEGORIA')
                                    <li><a class="dropdown-item" href="{{ route('funkos.category', $category->id) }}">{{ $category->nameCategory }}</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                            @endforeach
                        @endif

                    </ul>
                </div>
                </li>
                @if(auth()->check() && auth()->user()->role == 'admin')
                    <li class="nav-item mx-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Gestion General</button>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Funciones</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('categories.gestion') }}">Gestionar Categorias</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('funkos.gestion') }}">Gestionar Funkos</a></li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if(Route::has('login'))
                     @auth
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <button class="nav-link btn btn-danger text-light px-3" type="submit" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </button>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-light px-3" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                @endif

            </ul>
        </div>
    </div>
</nav>
