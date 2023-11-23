<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cronograma</title>
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

    @media (max-width: 767px) {
        /* Oculta el menú lateral en tamaños de pantalla pequeños */
        .menu-lateral {
            display: none;
        }
        /* Ajusta el margen izquierdo del contenido principal */
        .contenido-principal {
            margin-left: 0;
        }
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
                @if(Session::has('success'))
                <div id="success-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                <h5>ID del Cliente: {{ $id_cliente }}</h5>
                <h3 class="text-center">CRONOGRAMA DE ACTIVIDADES</h3>
                <p>
                    Ingrese el cronograma de trabajo a seguir para el proyecto de tendido de fibra óptica (el tiempo
                    estimado es a partir de su firma de contrato). **La información en color azul es un ejemplo,
                    usted deberá llenar las tablas de acuerdo a la información de su proyecto.
                </p>
                <br>
                <!-- Contenedor para la imagen y la tabla -->
                <div class="centered-container">
                    <img src="{{ asset('img/cronograma.png') }}" alt="Descripción de la imagen"
                        class="img-fluid mx-auto d-block" style="max-width: 700px; max-height: 700px;" />
                    <form method="post" action="{{ route('guardar_cronograma') }}">
                        @csrf
                        <input type="hidden" name="id_cliente" value="{{ $id_cliente }}">
                        <div class="section">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>PROCESO DE CONSTRUCCIÓN</th>
                                        <th>DESCRIPCIÓN</th>
                                        <th>FECHAS A REALIZAR (POSTERIOR A FIRMA DE CONTRATO DE ACCESO)</th>
                                        <th>
                                            <button type="button" class="btn btn-agregar"
                                                onclick="agregarFila()">AGREGAR</button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" name="proceso_construccion[]"
                                                required></td>
                                        <td><input type="text" class="form-control" name="descripcion[]" required></td>
                                        <td><input type="date" class="form-control" name="fecha[]" required></td>
                                        <td>
                                            <button type="button" class="btn btn-eliminar"
                                                onclick="eliminarFila(this)">Eliminar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="row mt-3">
                            <div class="col-md-6 d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary">GUARDAR</button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('siguiente_etiqueta') }}" class="btn btn-primary">SIGUIENTE</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
        function agregarFila() {
            const table = document.querySelector("table tbody");
            const newRow = table.insertRow(table.rows.length);

            const cell1 = newRow.insertCell(0);
            cell1.innerHTML = '<input type="text" class="form-control" name="proceso_construccion[]">';

            const cell2 = newRow.insertCell(1);
            cell2.innerHTML = '<input type="text" class="form-control" name="descripcion[]">';

            const cell3 = newRow.insertCell(2);
            cell3.innerHTML = '<input type="date" class="form-control" name="fecha[]">';

            const cell4 = newRow.insertCell(3);
            cell4.innerHTML =
                '<button type="button" class="btn btn-eliminar" onclick="eliminarFila(this)">Eliminar</button>';
        }

        function eliminarFila(button) {
            const row = button.parentNode.parentNode;
            row.remove();
        }
        </script>

        <script>
        // Espera a que el DOM esté completamente cargado
        document.addEventListener("DOMContentLoaded", function() {
            // Espera 5 segundos y oculta el mensaje de éxito
            setTimeout(function() {
                $("#success-message").fadeOut(500); // 500 milisegundos para desaparecer
            }, 5000); // 5000 milisegundos = 5 segundos
        });
        </script>
        <!-- Incluye los scripts de Bootstrap y jQuery (asegúrate de tener jQuery instalado) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </div>
</body>

</html>