@extends('layouts.app')

@section('content')
    <div class="row justify-content-center m-auto">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Inicia Sesion!</h1>
                                </div>
                                <form class="user" action="{{route('login')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror"
                                               id="email" name="email" value="{{old('email')}}" required autocomplete="email" autofocus
                                               placeholder="{{ __('Username') }}">
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                               id="password" name="password" autocomplete="current-password" placeholder="{{ __('Password') }}">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link col-6" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                        <span class="col-2"></span>
                                        <button type="submit" class="btn btn-primary btn-user btn-block col-4">
                                            Ingresar
                                        </button>
                                    </div>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center my-5">
                                    <a class="medium" href="{{ route('register') }}">Quiero registrarme!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
