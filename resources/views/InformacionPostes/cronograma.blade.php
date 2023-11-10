<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cronograma</title>
    <!-- Incluye los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para el fondo gris del menú lateral */
        .menu-lateral {
            background-color: #8e8e8e;
            /* Cambia el color de fondo del menú */
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            /* Ancho del menú lateral */
            transition: width 0.3s;
            /* Transición para plegar/desplegar el menú */
            z-index: 1;
        }

        /* Estilo para los elementos del menú */
        .nav-item {
            padding: 10px;
            text-align: center;
            font-size: 18px;
            /* Aumenta el tamaño del texto */
        }

        /* Cambia el color de texto y fondo en el hover */
        .nav-item:hover {
            background-color: #555;
            color: white;
        }

        /* Estilo para el contenido principal */
        .contenido-principal {
            margin-left: 250px;
            /* Ancho del menú lateral */
            padding: 15px;
        }

        .centered-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="height: 100vh;">
        <div class="row">
            <!-- Menú lateral -->
            <div class="col-md-3 menu-lateral">
                <div class="text-center">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="img/logoRVA.png" alt="Logo de la aplicación" class="img-fluid"
                            style="max-width: 100px;">
                        <p class="ml-2 mb-0 text-white">Administrador</p>
                    </div>
                </div>
                <ul class="nav flex-column">
                    <!-- Tus elementos li con efecto hover mejorado -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/registro_usuario">Cuestionario tendido de fibra óptica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/editar">Información postes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/eliminar_usuario">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
            <!-- Contenido principal -->
            <div class="col-md-9 contenido-principal">
                <form method="post">
                    @csrf
                    <h3 class="text-center">CRONOGRAMA DE ACTIVIDADES</h3>
                    <p>
                        Ingrese el cronograma de trabajo a seguir para el proyecto de tendido de fibra óptica (el tiempo
                        estimado es a partir de su firma de contrato). **La información en color azul es un ejemplo,
                        usted deberá llenar las tablas de acuerdo a la información de su proyecto.
                    </p>
                    <br>

                    <!-- Contenedor para la imagen y la tabla -->
                    <div class="centered-container">
                        <img src="/img/cronograma.png" alt="Descripción de la imagen" />
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
                                    <td><input type="text" class="form-control" name="no_poste[]"></td>
                                    <td><input type="text" class="form-control" name="accesorio[]"></td>
                                    <td><input type="text" class="form-control" name="latitud[]"></td>
                                    <td>
                                        <button type="button" class="btn btn-eliminar"
                                            onclick="eliminarFila(this)">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12 mt-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
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
            cell1.innerHTML = '<input type="text" class="form-control" name="no_poste[]">';

            const cell2 = newRow.insertCell(1);
            cell2.innerHTML = '<input type="text" class="form-control" name="accesorio[]">';

            const cell3 = newRow.insertCell(2);
            cell3.innerHTML = '<input type="text" class="form-control" name="latitud[]">';

            const cell4 = newRow.insertCell(3);
            cell4.innerHTML =
                '<button type="button" class="btn btn-eliminar" onclick="eliminarFila(this)">Eliminar</button>';
        }

        function eliminarFila(button) {
            const row = button.parentNode.parentNode;
            row.remove();
        }
    </script>

    <!-- Incluye los scripts de Bootstrap y jQuery (asegúrate de tener jQuery instalado) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
