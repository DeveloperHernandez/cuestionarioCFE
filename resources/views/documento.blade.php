<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
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
                        <a class="nav-link text-white" href="{{ route('editar_usuario') }}">Eliminar</a>
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
                <h2>Descargar Documento</h2> <br>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Exportar a Excel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->nombre_usuario }}</td>
                            <td>{{ $usuario->apellido_paterno }}</td>
                            <td>{{ $usuario->apellido_materno }}</td>
                            <td>
                                <a title="Descargar" class="btn btn-success" aria-current="page"
                                    href="exportar-usuario/{{$usuario->id_usuario}}" type="submit"><i
                                        class="fa-sharp fa-solid fa-rectangle-list"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Incluye los scripts de Bootstrap y jQuery (asegúrate de tener jQuery instalado) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>