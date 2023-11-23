<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infraestructura CFE</title>
    <!-- Incluye los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        /* Estilo para el menú lateral */
        .menu-lateral {
            background-color: #343a40;
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
            background-color: #495057;
        }

        /* Estilo para el contenido principal */
        .contenido-principal {
            margin-left: 250px;
            padding: 20px;
        }

        /* Estilo para el formulario */
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
        }

        /* Estilo para la tabla */
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        /* Estilo para botones en la tabla */
        .btn-eliminar {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .btn-eliminar:hover {
            background-color: #c82333;
        }

        .btn-agregar {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .btn-agregar:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="height: 100vh;">
        <div class="row">
            <!-- Menú lateral -->
            <div class="col-md-3 menu-lateral">
                <div class="text-center">
                    <img src="{{ asset('img/logoRVA.png') }}" alt="Logo de la aplicación" class="img-fluid logo"><br>
                    BIENVENIDO: {{ isset($ver['nombre_usuario']) ? $ver['nombre_usuario'] : 'No hay usuario' }}
                    USUARIO: {{ isset($ver['id_usuario']) ? $ver['id_usuario'] : 'No hay usuario' }}
                </div><br>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('registro') }}">Cuestionario tendido de
                            fibra óptica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('informacion_postes') }}">Información postes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('salir') }}">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
            <!-- Formulario -->
            <div class="col-md-9 contenido-principal">
            <h5>ID del Cliente: {{ $ver['id_usuario'] }}</h5>
                <h3 class="mb-4 text-center">RELACIÓN DE POSTES A UTILIZAR</h1>
                    <h5 class="mb-5 text-center">INFRAESTRUCTURA DE CFE A UTILIZAR</h5>
                    <p class="text-center">
                        ESTO ES UN EJEMPLO PARA QUE SIRVA COMO GUIA DE COMO DEBE INGRESAR LA INFORMACIÓN EN LA TABLA
                        <img src="{{ asset('img/Infraestructura_cfe.png') }}" alt="Ficha Técnica"
                            class="img-fluid mx-auto d-block" style="max-width: 50%; height: auto;">
                    </p>
                    <form method="post" action="{{ route('guardar_cfe') }}">
                        @csrf
                        <input type="hidden" name="id_cliente" value="{{ $ver['id_usuario'] }}">
                        <div class="section">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO.POSTE</th>
                                        <th>DESCRIPCION</th>
                                        <th>LATITUD</th>
                                        <th>LONGITUD</th>
                                        <th>DISTANCIA INTERPOSTAL</th>
                                        <th>TIPO DE FIBRA</th>
                                        <th>RESERVA(RAQUETA)</th>
                                        <th>METROS</th>
                                        <th><button type="button" class="btn btn-agregar"
                                                onclick="agregarFila()">AGREGAR</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="number" class="form-control" name="no_poste[]" required></td>
                                        <td><input type="text" class="form-control" name="descripcion[]" required></td>
                                        <td><input type="text" class="form-control" name="latitud[]" required></td>
                                        <td><input type="text" class="form-control" name="longitud[]" required></td>
                                        <td><input type="text" class="form-control" name="distancia_interpostal[]"required></td>
                                        <td><input type="text" class="form-control" name="tipo_de_fibra[]" required></td>
                                        <td><input type="text" class="form-control" name="reserva[]" required></td>
                                        <td><input type="text" class="form-control" name="metros[]" required></td>
                                        <td><button type="button" class="btn btn-eliminar" onclick="eliminarFila(this)">Eliminar</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary">GUARDAR</button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('siguiente_inf_cfe_equipo') }}" class="btn btn-primary">SIGUIENTE</a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <script>
        function agregarFila() {
            const table = document.querySelector("table tbody");
            const newRow = table.insertRow(table.rows.length - 1);

            const cell1 = newRow.insertCell(0);
            cell1.innerHTML = '<input type="text" class="form-control" name="no_poste[]">';

            const cell2 = newRow.insertCell(1);
            cell2.innerHTML = '<input type="text" class="form-control" name="descripcion[]">';

            const cell3 = newRow.insertCell(2);
            cell3.innerHTML = '<input type="text" class="form-control" name="latitud[]">';

            const cell4 = newRow.insertCell(3);
            cell4.innerHTML = '<input type="text" class="form-control" name="longitud[]">';

            const cell5 = newRow.insertCell(4);
            cell5.innerHTML = '<input type="text" class="form-control" name="distancia_interpostal[]">';

            const cell6 = newRow.insertCell(5);
            cell6.innerHTML = '<input type="text" class="form-control" name="tipo_de_fibra[]">';

            const cell7 = newRow.insertCell(6);
            cell7.innerHTML = '<input type="text" class="form-control" name="reserva[]">';

            const cell8 = newRow.insertCell(7);
            cell8.innerHTML = '<input type="text" class="form-control" name="metros[]">';

            const cell9 = newRow.insertCell(8);
            cell9.innerHTML =
                '<button type="button" class="btn btn-eliminar" onclick="eliminarFila(this)">Eliminar</button>';
        }

        function eliminarFila(button) {
            const row = button.parentNode.parentNode;
            row.remove();
        }
    </script>

    <!-- Enlace a Bootstrap JS (opcional, si necesitas funcionalidades de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
