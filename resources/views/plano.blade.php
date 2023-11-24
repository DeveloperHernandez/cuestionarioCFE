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
                    <img src="{{ asset('img/logoRVA.png') }}" alt="Logo de la aplicación" class="img-fluid logo"><br>
                    BIENVENIDO: {{ isset($ver['nombre_usuario']) ? $ver['nombre_usuario'] : 'No hay usuario' }}
                    USUARIO: {{ isset($ver['id_usuario']) ? $ver['id_usuario'] : 'No hay usuario' }}
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
            <h5>ID del Cliente: {{ $ver['id_usuario'] }}</h5>
                @if(Session::has('success'))
                <div id="success-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif
                <h1 class="text-center">Plano</h1>
                <p>
                    8. Asimismo, se requiere que adjunte un plano del lugar expedido por el municipio correspondiente,
                    donde deberá indicar el nombre de las calles que pertenecen a dicho municipio. (Esto con la
                    finalidad de tener la certeza de la distribución y nombre de las calles).
                    En caso de NO tener acceso a dicha información, puede ser sustituido por un archivo KMZ
                    georreferenciado utilizando la herramienta de Google Earth. Dentro del archivo KMZ, deberá indicar
                    el recorrido de la ruta. En caso de ocupar más de un tipo de fibra óptica, indíquelo en el archivo
                    KMZ con una simbología diferente. (Se le proporciona archivo ejemplo adjunto al correo).
                </p>
                <div class="container mt-5">
                    <p class="text-center">
                        <strong>NOTA:</strong> Se sugiere la aplicación UTM Geo Map para obtener las coordenadas de cada
                        poste.
                        Disponible solo para Android
                    </p>

                    <div class="text-center">
                        <img src="{{ asset('img/geoMap.png') }}" alt="Geo Map" class="img-fluid mx-auto d-block"
                            style="max-width: 30%; height: auto;">
                    </div>

                    <p class="text-center">
                        <a href="mailto:azael.hernandez@ramirezvargasabogados.com.mx">Favor de enviar el archivo al
                            correo</a>
                    </p>

                    <p class="mt-3 text-center">
                        <strong>Nota: Favor de presionar el botón Enviado después de haber enviado el correo</strong>
                    </p>

                    <form action="{{ route('marcar_enviado_plano_adjunto') }}" method="post" class="text-center">
                        @csrf
                        <input type="hidden" name="id_cliente" value="{{ $ver['id_usuario'] }}">
                        <button type="submit" class="btn btn-primary btn-enviar" id="btnPlano"
                            name="boton1">Enviado</button>
                    </form>
                </div>

                <p>
                    9. El proveedor del cable de fibra óptica y materiales a utilizar para el tendido deberá
                    proporcionarle una ficha técnica con las especificaciones de los elementos, como son:
                    Su peso, número de hilos, longitud, etc. Dicha ficha técnica deberá enviarla para su revisión, ya
                    que la información contenida se utilizará para incluirla en el plano y documentos anexos.
                </p>

                <div class="container mt-5">
                    <div class="text-center">
                        <img src="{{ asset('img/fichaTecnica.png') }}" alt="Ficha Técnica"
                            class="img-fluid mx-auto d-block" style="max-width: 30%; height: auto;">
                    </div>

                    <p class="text-center">
                        <a href="mailto:azael.hernandez@ramirezvargasabogados.com.mx">Favor de enviar el archivo al
                            correo</a>
                    </p>

                    <p class="mt-3 text-center">
                        <strong>Nota: Favor de presionar el botón Enviado después de haber enviado el correo</strong>
                    </p>

                    <form action="{{ route('marcar_enviado_ficha_tecnica_adjunto') }}" method="post"
                        class="text-center">
                        @csrf
                        <input type="hidden" name="id_cliente" value="{{ $ver['id_usuario'] }}">
                        <button type="submit" class="btn btn-primary btn-enviar" id="btnFicha"
                            name="boton2">Enviado</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Incluye los scripts de Bootstrap y jQuery (asegúrate de tener jQuery instalado) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
    // Espera a que el DOM esté completamente cargado
    document.addEventListener("DOMContentLoaded", function() {
        // Espera 5 segundos y oculta el mensaje de éxito
        setTimeout(function() {
            $("#success-message").fadeOut(500); // 500 milisegundos para desaparecer
        }, 5000); // 5000 milisegundos = 5 segundos
    });
    </script>

    <script>
    // Espera a que el DOM esté completamente cargado
    document.addEventListener("DOMContentLoaded", function() {
        // Espera 5 segundos y oculta el mensaje de éxito
        setTimeout(function() {
            $("#success-message").fadeOut(500); // 500 milisegundos para desaparecer
        }, 5000); // 5000 milisegundos = 5 segundos

        // Agrega un evento de clic al botón "Enviado" del plano
        document.getElementById('btnPlano').addEventListener('click', function(event) {
            event.preventDefault(); // Previene el envío del formulario por defecto

            // Muestra el mensaje de agradecimiento usando SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Gracias por enviar el plano.',
                showConfirmButton: false,
                timer: 1500 // 1.5 segundos
            }).then((result) => {
                // En este punto, puedes realizar cualquier acción adicional después de que el usuario ve el mensaje.
                // Por ejemplo, enviar el formulario utilizando JavaScript.
                document.forms[0].submit(); // Envía el formulario manualmente
            });
        });

        // Agrega un evento de clic al botón "Enviado" de la ficha técnica
        document.getElementById('btnFicha').addEventListener('click', function(event) {
            event.preventDefault(); // Previene el envío del formulario por defecto

            // Muestra el mensaje de agradecimiento usando SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Gracias por enviar la ficha técnica.',
                showConfirmButton: false,
                timer: 1500 // 1.5 segundos
            }).then((result) => {
                // En este punto, puedes realizar cualquier acción adicional después de que el usuario ve el mensaje.
                // Por ejemplo, enviar el formulario utilizando JavaScript.
                document.forms[1].submit(); // Envía el formulario manualmente
            });
        });
    });
    </script>

</body>

</html>

