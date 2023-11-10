<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etiqueta</title>
    <!-- Incluye los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para el fondo gris del menú lateral */
        .menu-lateral {
            background-color: #8e8e8e; /* Cambia el color de fondo del menú */
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
            font-size: 18px; /* Aumenta el tamaño del texto */
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
            
            <div class="col-md-9 contenido-principal text-center">
                <p>
                    En cada estructura el cable de red de telecomunicaciones se debe identificar con etiqueta de vinilo
                    para exteriores de alta adhesión, del color que aluda a cada compañía y deberá llevar el nombre del
                    prestador de telecomunicaciones. Favor de indicar los elementos o diseño de la etiqueta que utilizara para
                    identificar su infraestructura. Incluir nombre comercial y número de contacto.
                </p>
                <br><br>
                <div class="centered-image">
                    <p class="text-center"><strong>Ejemplo</strong></p>
                    <img src="/img/etiqueta.png" alt="Descripción de la imagen" />
                </div>
            
                <br>
                <p><strong>Favor de enviar el archivo al correo</strong></p><br>
                <p><a href="mailto:azael.hernandez@ramirezvargasabogados.com.mx">Enviar al correo: </a></p>
            </div>
            

        </div>
    </div>

    <!-- Incluye los scripts de Bootstrap y jQuery (asegúrate de tener jQuery instalado) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>


<style>

</style>
