@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="login-container border rounded p-4" style="width: 400px;">
        <h4 class="text-center display-4 mb-4">Iniciar sesión</h4>
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control @error('nombre_cliente') is-invalid @enderror"
                    id="nombre_cliente" name="nombre_cliente" placeholder="Ingrese su usuario">
                @error('nombre_cliente')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" class="form-control @error('passwords') is-invalid @enderror" id="passwords"
                    name="passwords" placeholder="Ingrese su contraseña">
                @error('passwords')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-dark btn-block btn-lg text-white">Ingresar</button>
        </form>
    </div>
</div>
@endsection