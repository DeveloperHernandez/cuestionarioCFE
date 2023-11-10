<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Usuario</title>
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
                    <p class="text-white">Administrador</p>
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
                        <a class="nav-link text-white">Descargar Excel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('salir')}}">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 contenido-principal">
                <h1>Detalles del Usuario</h1>
                @foreach($usuarios as $usuario)
                <div class="card card-usuario">
                    <div class="card-body">
                        <h5 class="card-title"><strong>INFORMACIÓN PERSONAL</strong></h5>
                        <p class="card-text"><strong>NOMBRE:</strong> {{ $usuario->nombre_usuario ? $usuario->nombre_usuario : 'Sin nombre' }}</p>
                        <p class="card-text"><strong>APELLIDO PATERNO:</strong> {{ $usuario->apellido_paterno ? $usuario->apellido_paterno : 'Sin apellido paterno' }}</p>
                        <p class="card-text"><strong>APELLIDO MATERNO:</strong> {{ $usuario->apellido_materno ? $usuario->apellido_materno : 'Sin apellido materno' }}</p>
                        <p class="card-text"><strong>TELÉFONO:</strong> {{ $usuario->telefono ? 
                        $usuario->telefono : 'Sin telefono' }}</p>
                        <p class="card-text"><strong>CORREO ELECTRÓNICO:</strong> {{ $usuario->correo_electronico ? 
                        $usuario->correo_electronico : 'Sin correo_electronico' }}</p>
                        <p class="card-text"><strong>CONTRASEÑA:</strong> {{ $usuario->contrasenia ? 
                        $usuario->contrasenia : 'Sin contrasenia' }}</p>
                        <p class="card-text"><strong>ROL:</strong> {{ $usuario->rol ? 
                                                $usuario->rol : 'Sin rol' }}</p>
                        <!-- Agrega más campos de información aquí -->
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Incluye los scripts de Bootstrap y jQuery (asegúrate de tener jQuery instalado) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
