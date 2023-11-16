<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plano</title>
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
                <p>
                    8. Asimismo, se requiere que adjunte un plano del lugar expedido por el municipio correspondiente,
                    donde deberá indicar el nombre de las calles que pertenecen a dicho municipio. (Esto con la
                    finalidad de tener la certeza de la distribución y nombre de las calles).
                    En caso de NO tener acceso a dicha información, puede ser sustituido por un archivo KMZ
                    georreferenciado utilizando la herramienta de Google Earth. Dentro del archivo KMZ, deberá indicar
                    el recorrido de la ruta. En caso de ocupar más de un tipo de fibra óptica, indíquelo en el archivo
                    KMZ con una simbología diferente. (Se le proporciona archivo ejemplo adjunto al correo).
                    <br>
                <p class="text-center"> <strong> NOTA: </strong>
                    Se sugiere la aplicación UTM Geo Map para obtener las coordenadas de cada poste. Disponible solo
                    para Android
                </p>
                <img src="{{ asset('img/geoMap.png') }}" alt="Geo Map" class="img-fluid mx-auto d-block"
                    style="max-width: 30%; height: auto;">
                <form action="{{ route('marcar_enviado_plano_adjunto') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_cliente" value="{{ $id_cliente }}">
                    <button type="submit" class="btn btn-primary" name="boton1">Enviado </button>
                </form>
                </p>
                <!-- Enlace para abrir Gmail -->
                <p class="text-center">
                    <a href="mailto:?subject=Adjuntar plano&body=Adjunto el plano solicitado.">Enviar correo</a>
                </p>
                <p>
                    9. El proveedor del cable de fibra óptica y materiales a utilizar para el tendido deberá
                    proporcionarle una ficha técnica con las especificaciones de los elementos, como son:
                    Su peso, número de hilos, longitud, etc. Dicha ficha técnica deberá enviarla para su revisión, ya
                    que la información contenida se utilizará para incluirla en el plano y documentos anexos.
                    <img src="{{ asset('img/fichaTecnica.png') }}" alt="Ficha Técnica" class="img-fluid mx-auto d-block"
                        style="max-width: 30%; height: auto;">
                </p>

                <form action="{{ route('marcar_enviado_ficha_tecnica_adjunto') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_cliente" value="{{ $id_cliente }}">
                    <button type="submit" class="btn btn-primary" name="boton2">Enviado</button>
                </form>

                <p class="text-center">
                    <a href="mailto:?subject=Adjuntar plano&body=Adjunto el plano solicitado.">Enviar correo</a>
                </p>
            </div>
        </div>
    </div>


    <!-- Incluye los scripts de Bootstrap y jQuery (asegúrate de tener jQuery instalado) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>