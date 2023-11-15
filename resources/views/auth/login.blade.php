@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="login-container border rounded p-4" style="width: 400px;">
        <h2 class="text-center display-4">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="nombre_cliente" class="small">USUARIO</label>
                <input type="text" class="form-control form-control-lg" id="nombre_cliente" name="nombre_cliente" placeholder="Usuario" required>
            </div>

            <div class="form-group">
                <label for="passwords" class="small">CONTRASEÑA</label>
                <input type="password" class="form-control form-control-lg" id="passwords" name="passwords" placeholder="Contraseña" required>
            </div>

            <button type="submit" class="btn btn-dark btn-block btn-lg text-white">Login</button>
        </form>
    </div>
</div>
@endsection