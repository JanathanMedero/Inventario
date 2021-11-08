@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header" style="background-color: #133aa1;">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <h3 class="mb-0 text-white">Ingrese sus datos de acceso</h3>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-10">
                                        <img src="{{ asset('assets/images/credentials.png') }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-3 justify-content-center">
                            <div class="col-md-10">
                                <input id="email" placeholder="Correo Electrónico" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3 justify-content-center">
                            <div class="col-md-10">
                                <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="d-grid gap-2 col-md-12 mx-auto">
                                        <button class="btn text-white btn-block" type="submit" style="background-color: #133aa1;">Iniciar Sesión</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
