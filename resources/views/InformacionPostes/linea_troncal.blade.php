<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linea Troncal</title>
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
                <h3 class="mt-2">LINEA TRONCAL</h5>
                    <p>De acuerdo a su proyecto indicar la cantidad de materiales a utilizar en la siguiente tabla, la
                        información debe coincidir con las fichas técnicas solicitadas en el punto anterior. En caso de
                        que
                        no
                        aplique colocar la leyenda “NO APLICA”.
                    </p>
                    <h5>ID del Cliente: {{ $id_cliente }}</h5>
                    <form method="post" action="{{ route('guardar_linea_troncal') }}">
                        @csrf
                        <input type="hidden" name="id_cliente" value="{{ $id_cliente }}">
                        <label for="nombre">Tipo de Elemento:</label>
                        <select name="nombre" class="form-control form-select" required>
                            <option value="NUMERO DE POSTES CFE">Numero de Postes CFE</option>
                            <option value="FLEJES (MTS)">Flejes (MTS)</option>
                            <option value="HEBILLAS">Hebillas</option>
                            <option value="HERRAJE D">Herraje D</option>
                            <option value="HERRAJE J">Herraje J</option>
                            <option value="TENSORES">Tensores</option>
                            <option value="FIBRA ÓPTICA #HILOS">Fibra Óptica #Hilos</option>
                        </select>

                        <label for="piezas">Piezas:</label>
                        <input type="number" name="piezas" class="form-control" required>

                        <label for="peso_por_pieza">Peso por Pieza:</label>
                        <input type="number" step="0.01" name="peso_por_pieza" class="form-control" required>
                        <br>
                        <div class="row mt-3">
                            <div class="col-md-6 d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary">GUARDAR</button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('siguiente_distribucion') }}" class="btn btn-primary">SIGUIENTE</a>
                            </div>
                        </div>
                    </form>
                    <h5>Resultados</h5>
                    <table class="table border" id="tablaResultados">
                        <thead>
                            <tr>
                                <th scope="col">Elemento</th>
                                <th scope="col">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se agregarán las filas dinámicamente pero si el cliente guarda mas tipo de elemento con piezas y peso por pieza nuevo, ya no se logra ver esa nueva tabla junto con el que se guardó anteriormente, lo que deseo es que -->
                        </tbody>
                    </table>

            </div>

            <!-- Enlace a Bootstrap JS (opcional, si necesitas funcionalidades de Bootstrap) -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            <script>
            $(document).ready(function() {
                // Agrega un evento al botón de GUARDAR
                $('form').submit(function(event) {
                    event.preventDefault(); // Evita que se envíe el formulario automáticamente

                    // Obtén los valores de los campos del formulario
                    var tipoElemento = $('select[name="nombre"]').val();
                    var piezas = $('input[name="piezas"]').val();
                    var pesoPorPieza = $('input[name="peso_por_pieza"]').val();

                    // Llama a la función para actualizar la tabla de resultados
                    actualizarTabla(tipoElemento, piezas, pesoPorPieza);
                });

                // Función para actualizar la tabla de resultados
                function actualizarTabla(tipoElemento, piezas, pesoPorPieza) {
                    // Obtén el tbody de la tabla de resultados
                    var tbody = $('#tablaResultados tbody');

                    // Elimina las filas existentes
                    tbody.empty();

                    // Agrega nuevas filas con los resultados
                    agregarFila(tbody, 'Tipo de Elemento', tipoElemento);
                    agregarFila(tbody, 'Piezas', piezas);
                    agregarFila(tbody, 'Peso por Pieza', pesoPorPieza);
                }

                // Función para agregar una fila a la tabla de resultados
                function agregarFila(tbody, label, valor) {
                    tbody.append('<tr><td>' + label + '</td><td>' + valor + '</td></tr>');
                }
            });
            </script>
        </div>
    </div>
</body>

</html>