<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruta</title>
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
                <form method="post" action="{{ route('guardar_ruta') }}">
                    @csrf
                    <input type="hidden" name="id_cliente" value="{{ $id_cliente }}">
                    <h6>4. Mencione el nombre del lugar/es que atravesará la ruta.(Colonias, localidad, municipio,
                        estado, código postal)</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="colonia">Colonia</label>
                                <input type="text" class="form-control" id="colonia" name="colonia">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="localidad">Localidad</label>
                                <input type="text" class="form-control" id="localidad" name="localidad">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="municipio">Municipio</label>
                                <input type="text" class="form-control" id="municipio" name="municipio">
                            </div>
                        </div>
                    </div>

                    <div class="row">


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="codigo_postal">Código Postal</label>
                                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nombre_lugar">Nombre lugar</label>
                        <input type="text" class="form-control" id="nombre_lugar" name="nombre_lugar" readonly>
                    </div>

                    <hr>
                    <h6>5. Indicar la dirección exacta donde inicia y finaliza la ruta, (Incluir coordenadas del lugar)
                    </h6>
                    <p>Ejemplo</p>
                    <!-- Agrega una tabla de dos columnas aquí -->
                    <div class="row">
                        <div class="col-6">
                            <p class="text-center">Inicio</p>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Ejemplo. calle Las Flores núm. 33, entre las calles Bugambilias y Jazmines,
                                        Abejones, Oaxaca de Juárez, Oaxaca, C.P. 26089
                                        Latitud: 18.802248
                                        Longitud: -99-71811725</td>
                                </tr>
                            </table>
                            <p></p>
                        </div>
                        <div class="col-6">
                            <p class="text-center">Final</p>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Ejemplo: calle Flor de Liz núm. 103, entre calles Laurel y Las Rosas, Abejones,
                                        Oaxaca de Juárez, Oaxaca, C.P. 26089
                                        Latitud: 21.24953808
                                        Longitud: -102.335787</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- Primer conjunto de campos -->
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <p class="justify-content-center">Inicio</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="text" class="form-control" id="num" name="num" placeholder="Número">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="text" class="form-control" id="entre_calles" name="entre_calles"
                                        placeholder="Entre las calles">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="text" class="form-control" id="estado" name="estado"
                                        placeholder="Estado">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="text" class="form-control" id="cp" name="cp"
                                        placeholder="Código postal">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="text" class="form-control" id="latitud" name="latitud"
                                        placeholder="Latitud">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="text" class="form-control" id="longitud" name="longitud"
                                        placeholder="Longitud">
                                </div>
                                <div class="form-group">
                                    <label for="inicio">Inicio</label>
                                    <input type="text" class="form-control" id="inicio" name="inicio" readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <p>Final</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="calle_2" name="calle_2"
                                        placeholder="Calle">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="text" class="form-control" id="num_2" name="num-2"
                                        placeholder="Número">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="text" class="form-control" id="entre_calles_2" name="entre_calles_2"
                                        placeholder="Entre las calles">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="text" class="form-control" id="estado_2" name="estado_2"
                                        placeholder="Estado">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="text" class="form-control" id="cp_2" name="cp_2"
                                        placeholder="Código postal">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="text" class="form-control" id="latitud_2" name="latitud_2"
                                        placeholder="Latitud">
                                </div>

                                <div class="form-group mt-2">
                                    <input type="text" class="form-control" id="longitud_2" name="longitud_2"
                                        placeholder="Longitud">
                                </div>
                                <div class="form-group">
                                    <label for="final">Final</label>
                                    <input type="text" class="form-control" id="final" name="final" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="container">
                        <label for="calle">6. Indicar el número de postes y total de KM de cable a instalar</label>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="numero_postes" name="numero_postes"
                                        placeholder="Número de postes">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="totalkm_cable" name="totalkm_cable"
                                        placeholder="Total Km Cable">
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <p>7. Dentro de la ruta a recorrer, ¿Utilizará únicamente la infraestructura de CFE?, en
                                    caso de
                                    utilizar infraestructura de un tercero ya sea Telmex o incluso infraestructura
                                    propia,
                                    indicar en el siguiente apartado el núnmero de postes a utilizar y KM a recorrer</p>
                                <label for="calle">Ejemplo: Dentro de la ruta se utilizarán 2 postes propios y 14
                                    propiedad de
                                    Telmex - un total de 500 mts, se anexan los documentos correspondientes a los
                                    permisos para
                                    su instalación.</label>
                                <input type="text" class="form-control" id="infraestructura_cfe_tercero"
                                    name="infraestructura_cfe_tercero">
                            </div>
                        </div>
                    </div>


                    <br>
                    <div class="col-md-12 mt-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Incluye los scripts de Bootstrap y jQuery (asegúrate de tener jQuery instalado) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
    // Autocompletar el campo "Nombre lugar" con comas a medida que se escriben los datos
    $('#colonia, #municipio, #codigo_postal, #localidad, #estado').on('input', function() {
        const nombreLugar = [
            $('#colonia').val(), $('#municipio').val(), $('#codigo_postal').val(), $('#localidad').val(), $(
                '#estado').val()
        ].join(', ');

        $('#nombre_lugar').val(nombreLugar);
    });
    </script>

    <!-- Añade esta línea en tu archivo Blade para incluir jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    // Función para actualizar los campos de "Inicio" y "Final"
    function actualizarCamposInicioFinal() {
        var calle = $('#calle').val();
        var num = $('#num').val();
        var entre_calles = $('#entre_calles').val();
        var estado = $('#estado').val();
        var cp = $('#cp').val();
        var latitud = $('#latitud').val();
        var longitud = $('#longitud').val();

        var calle_2 = $('#calle_2').val();
        var num_2 = $('#num_2').val();
        var entre_calles_2 = $('#entre_calles_2').val();
        var estado_2 = $('#estado_2').val();
        var cp_2 = $('#cp_2').val();
        var latitud_2 = $('#latitud_2').val();
        var longitud_2 = $('#longitud_2').val();

        // Actualiza el campo "Inicio"
        $('#inicio').val(calle + ', ' + num + ', ' + entre_calles + ', ' + estado + ', ' + cp + ', ' + latitud + ', ' +
            longitud);

        // Actualiza el campo "Final"
        $('#final').val(calle_2 + ', ' + num_2 + ', ' + entre_calles_2 + ', ' + estado_2 + ', ' + cp_2 + ', ' +
            latitud_2 + ', ' + longitud_2);
    }

    // Agrega un controlador de eventos para los campos que deben activar la actualización
    $('#calle, #num, #entre_calles, #estado, #cp, #latitud, #longitud').on('input', function() {
        actualizarCamposInicioFinal();
    });

    // Agrega un controlador de eventos para los campos que deben activar la actualización
    $('#calle_2, #num_2, #entre_calles_2, #estado_2, #cp_2, #latitud_2, #longitud_2').on('input', function() {
        actualizarCamposInicioFinal();
    });
    // Llama a la función inicialmente para llenar los campos "Inicio" y "Final" si es necesario
    actualizarCamposInicioFinal();
    </script>
</body>

</html>