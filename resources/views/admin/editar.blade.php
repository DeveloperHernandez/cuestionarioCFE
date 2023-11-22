<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
    <!-- Incluye los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <style>
    /* Estilo para el menú lateral */
    .menu-lateral {
        background-color: #333;
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        padding: 20px;
        color: white;
    }

    /* Estilo para el logotipo */
    .logo {
        max-width: 100px;
        margin-bottom: 20px;
    }

    /* Estilo para los elementos del menú */
    .nav-item {
        padding: 10px 0;
        text-align: center;
        font-size: 18px;
    }

    .nav-item:hover {
        background-color: #555;
    }

    /* Estilo para el contenido principal */
    .contenido-principal {
        margin-left: 250px;
        padding: 20px;
    }

    /* Estilo para la tarjeta que contiene la información del usuario */
    .card-usuario {
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    /* Estilo para el botón "Volver a la lista de usuarios" */
    .btn-volver {
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <div class="container-fluid" style="height: 100vh;">
        <div class="row">
            <!-- Menú lateral -->
            <div class="col-md-3 menu-lateral">
                <div class="text-center">
                    <img src="{{ asset('img/logoRVA.png') }}" alt="Logo de la aplicación" class="img-fluid logo">
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('registro_usuario') }}">Registrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('ver_usuario') }}">Ver usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('editar_usuario') }}">Editar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('eliminar_usuario') }}">Eliminar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('ver_cliente_documento') }}">Descargar Excel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('salir')}}">Cerrar sesión</a>
                    </li>
                </ul>
            </div>

            <!-- Contenido principal -->
            <div class="col-md-9 contenido-principal">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <h2>Editar Usuario</h2> <br>
                <form method="POST" action="{{ route('actualizar_usuario', ['id_usuario' => $usuario->id_usuario]) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Primera columna -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre_usuario">NOMBRE(S)</label>
                                <input type="text" class="form-control @error('nombre_usuario') is-invalid @enderror"
                                    id="nombre_usuario" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}">
                                @error('nombre_usuario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="telefono">TELEFONO</label>
                                <input type="tel" class="form-control @error('telefono') is-invalid @enderror"
                                    id="telefono" name="telefono" value="{{ $usuario->telefono }}">
                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Segunda columna -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_paterno">APELLIDO PATERNO</label>
                                <input type="text" class="form-control @error('apellido_paterno') is-invalid @enderror"
                                    id="apellido_paterno" name="apellido_paterno"
                                    value="{{ $usuario->apellido_paterno }}">
                                @error('apellido_paterno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="correo_electronico">CORREO ELECTRÓNICO</label>
                                <input type="email"
                                    class="form-control @error('correo_electronico') is-invalid @enderror"
                                    id="correo_electronico" name="correo_electronico"
                                    value="{{ $usuario->correo_electronico }}">
                                @error('correo_electronico')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Tercera columna -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_materno">APELLIDO MATERNO</label>
                                <input type="text" class="form-control @error('apellido_materno') is-invalid @enderror" id="apellido_materno" name="apellido_materno"
                                    value="{{ $usuario->apellido_materno }}">
                                    @error('apellido_materno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="rol">ROLES</label>
                                <select class="form-control  form-select @error('rol') is-invalid @enderror" id="rol" name="rol">
                                    @foreach(['USUARIO', 'ADMINISTRADOR'] as $rol)
                                    <option value="{{ $rol }}" {{ $usuario->rol == $rol ? 'selected' : '' }}>
                                        {{ $rol }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('rol')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <button class="btn btn-primary mt-4" id="generar-contrasena">GENERAR NUEVA
                                CONTRASEÑA</button>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="contrasenia">CONTRASEÑA GENERADA</label>
                                    <input type="text" class="form-control @error('contrasenia') is-invalid @enderror" id="contrasenia" , name="contrasenia">
                                    @error('contrasenia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-12 mt-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">GUARDAR CAMBIOS</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
    document.getElementById('generar-contrasena').addEventListener('click', function() {
        event.preventDefault(); // Previene la recarga de la página
        var contrasenaGenerada = generarContrasenaUnica(); // Lógica para generar una contraseña única
        document.getElementById('contrasenia').value = contrasenaGenerada;
    });

    // Función para generar una contraseña única
    function generarContrasenaUnica() {
        // Puedes implementar tu lógica para generar una contraseña aquí.
        // Un ejemplo simple es generar una contraseña al azar.
        var caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var contrasena = '';
        var longitud = 8; // Longitud de la contraseña
        for (var i = 0; i < longitud; i++) {
            contrasena += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
        }
        return contrasena;
    }
    </script>

    <!-- Incluye los scripts de Bootstrap y jQuery (asegúrate de tener jQuery instalado) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>