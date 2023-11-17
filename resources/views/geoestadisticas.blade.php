<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geoestadística</title>
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
                        <a class="nav-link text-white" href="{{ route('registro') }}">Cuestionario tendido de fibra
                            óptica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('informacion_postes') }}">Información postes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('salir')}}">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
            <!-- Formulario -->
            <div class="col-md-9 contenido-principal">
                <h5>ID del Cliente: {{ $id_cliente }}</h5>
                <form method="post" action="{{ route('guardar_geoestadisticas') }}">
                    @csrf
                    <input type="hidden" name="id_cliente" value="{{ $id_cliente }}">
                    <h5>2. Datos de áreas geoestadísticas</h5>
                    <p class="text-justify">Rellenar de cada una de las columnas de acuerdo con la localidad, municipio
                        y estado donde esté interesado en tender su infraestructura. <strong>Importante:</strong> Las
                        áreas señaladas deben de estar acreditadas dentro del Registro público de concesiones de IFT a
                        nombre del solicitante.<br> <br>Indicar las localidades, municipios o Estados en los que
                        iniciará a prestar servicios. El área geoestadística a registrar puede ser desde la totalidad
                        del Estado, hasta las localidades específicas de un Estado en las que se ofrecerá el(los)
                        servicio(s) de telecomunicaciones.</p>
                    <!-- Tabla para ingresar los datos -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">LOCALIDAD</th>
                                <th scope="col">MUNICIPIO</th>
                                <th scope="col">ESTADO</th>
                                <td>
                                    <div class="col-md-12 mt-3 d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary"
                                            onclick="agregarFila()">AGREGAR</button>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control" name="localidad[]"></td>
                                <td>
                                    <select class="form-control form-select" name="municipio[]">
                                        @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id_municipio }}">{{ $municipio->municipio }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control form-select" name="estado[]">
                                        @foreach ($estados as $estado)
                                        <option value="{{ $estado->id_estado }}">{{ $estado->estado }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <div class="col-md-12 mt-3 d-flex justify-content-end">
                                        <button type="button" class="btn btn-danger"
                                            onclick="eliminarFila(this)">ELIMINAR</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="form-group">
                        <label for="uso_posteria">3. Indicar si ya se encuentra haciendo uso de la postería
                            solicitada</label>
                        <input type="text" class="form-control" id="uso_posteria" name="uso_posteria">
                    </div>
                    <br>
                    <div class="row mt-3">
                        <div class="col-md-6 d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary">GUARDAR</button>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="{{ route('siguiente_ruta') }}" class="btn btn-primary">SIGUIENTE</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Incluye los scripts de Bootstrap y jQuery (asegúrate de tener jQuery instalado) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
    function agregarFila() {
        const tabla = document.querySelector("table tbody");
        const fila = document.createElement("tr");

        fila.innerHTML = `
                <td><input type="text" class="form-control" name="localidad[]"></td>
                <td>
                    <select class="form-control form-select" name="municipio[]">
                        @foreach ($municipios as $municipio)
                        <option value="{{ $municipio->id_municipio }}">{{ $municipio->municipio }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="form-control form-select" name="estado[]">
                        @foreach ($estados as $estado)
                        <option value="{{ $estado->id_estado }}">{{ $estado->estado }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <div class="col-md-12 mt-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger" onclick="eliminarFila(this)">ELIMINAR</button>
                    </div>
                </td>
            `;
        tabla.appendChild(fila);
    }

    function eliminarFila(boton) {
        const fila = boton.closest("tr");
        fila.remove();
    }
    </script>

</body>

</html>



