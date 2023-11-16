<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etiqueta</title>
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
            <div class="col-md-9 contenido-principal text-center">
                <h5>ID del Cliente: {{ $id_cliente }}</h5>
                <p>
                    En cada estructura, el cable de red de telecomunicaciones se debe identificar con etiqueta de vinilo
                    para exteriores de alta adhesión, del color que aluda a cada compañía y deberá llevar el nombre del
                    prestador de telecomunicaciones. Favor de indicar los elementos o diseño de la etiqueta que
                    utilizará para identificar su infraestructura. Incluir nombre comercial y número de contacto.
                </p>
                <br><br>
                <div class="centered-image">
                    <p class="text-center"><strong>Ejemplo</strong></p>
                    <img src="{{ asset('img/Etiqueta.png') }}" alt="Descripción de la imagen" class="img-fluid"
                        style="max-width: 700px; max-height: 700px; margin: 0 auto;" />
                </div>

                <br>
                <p class="mt-3"><strong>Favor de enviar el archivo al correo</strong></p>
                <p><a href="mailto:azael.hernandez@ramirezvargasabogados.com.mx">Enviar al correo</a></p>
                <form action="{{ route('marcar_enviado_etiqueta') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_cliente" value="{{ $id_cliente }}">
                    <button type="submit" class="btn btn-primary" name="boton3">Enviado</button>
                </form>

            </div>



        </div>
    </div>

    <!-- Incluye los scripts de Bootstrap y jQuery (asegúrate de tener jQuery instalado) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>