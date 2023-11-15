<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infraestructura CFE Equipo</title>
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
                    <p class="text-white">Usuario</p>
                </div>
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
                <h5>ID del Cliente: {{ $id_cliente }}</h5>
                <h3 class="mb-4 text-center">RELACIÓN DE POSTES A UTILIZAR</h1>
                    <h5 class="mb-5 text-center">INFRAESTRUCTURA DE CFE A UTILIZAR CON EQUIPO</h5>
                    <form method="post" action="{{ route('guardar_cfe_equipo') }}">
                        @csrf
                        <input type="hidden" name="id_cliente" value="{{ $id_cliente }}">
                        <div class="section">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO.POSTE</th>
                                        <th>ACCESORIO</th>
                                        <th>LATITUD</th>
                                        <th>LONGITUD</th>
                                        <th><button type="button" class="btn btn-agregar"
                                                onclick="agregarFila()">AGREGAR</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" name="no_poste[]"></td>
                                        <td><input type="text" class="form-control" name="accesorio[]"></td>
                                        <td><input type="text" class="form-control" name="latitud[]"></td>
                                        <td><input type="text" class="form-control" name="longitud[]"></td>
                                        <td><button type="button" class="btn btn-eliminar"
                                                onclick="eliminarFila(this)">Eliminar</button></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
            </div>

            <!-- Enlace a Bootstrap JS (opcional, si necesitas funcionalidades de Bootstrap) -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script>
            function agregarFila() {
                const table = document.querySelector("table tbody");
                const newRow = table.insertRow(table.rows.length - 1);

                const cell1 = newRow.insertCell(0);
                cell1.innerHTML = '<input type="text" class="form-control" name="no_poste[]">';

                const cell2 = newRow.insertCell(1);
                cell2.innerHTML = '<input type="text" class="form-control" name="accesorio[]">';

                const cell3 = newRow.insertCell(2);
                cell3.innerHTML = '<input type="text" class="form-control" name="latitud[]">';

                const cell4 = newRow.insertCell(3);
                cell4.innerHTML = '<input type="text" class="form-control" name="longitud[]">';

                const cell9 = newRow.insertCell(4);
                cell9.innerHTML =
                    '<button type="button" class="btn btn-eliminar" onclick="eliminarFila(this)">Eliminar</button>';
            }

            function eliminarFila(button) {
                const row = button.parentNode.parentNode;
                row.remove();
            }
            </script>
        </div>
    </div>
</body>

</html>