@extends('layouts.app') <!-- Asume que tienes una plantilla Blade llamada 'layouts.app' -->

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="login-container">
        <h2 class="text-center display-5">Iniciar Sesión</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="usuario" class="small">USUARIO</label>
                <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Usuario" required>
            </div>

            <div class="form-group">
                <label for="passwords" class="small">CONTRASEÑA</label>
                <input type="passwords" class="form-control" id="passwords" name="passwords" placeholder="Contraseña" required>
            </div>

            <button type="submit" class="btn btn-dark btn-block text-white">Login</button>
        </form>
    </div>
</div>
@endsection
