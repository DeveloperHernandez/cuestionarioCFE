<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accesorio</title>
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
                    <br>
                    BIENVENIDO: {{ isset($ver['nombre_usuario']) ? $ver['nombre_usuario'] : 'No hay usuario' }}
                    USUARIO: {{ isset($ver['id_usuario']) ? $ver['id_usuario'] : 'No hay usuario' }}
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
            <h5>ID del Cliente: {{ $ver['id_usuario'] }}</h5>
                @if(Session::has('success'))
                <div id="success-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif
                <h3 class="mt-2">ACCESORIO</h3>
                
                <form method="post" action="{{ route('guardar_accesorio') }}">
                    @csrf
                    <input type="hidden" name="id_cliente" value="{{ $ver['id_usuario'] }}">
                    <label for="nombre">Tipo de Elemento:</label>
                    <select name="nombre" class="form-control form-select @error('nombre') is-invalid @enderror" required>
                        <option value="CAJAS DE EMPALME">Cajas de empalme</option>
                        <option value="CAJAS DE DISTRIBUCIÓN">Cajas de distribución</option>
                        <option value="RAQUETAS">Raquetas</option>
                        @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </select>
                    <label for="peso_por_pieza">Peso por Pieza:</label>
                    <input type="number" step="0.01" name="peso_por_pieza"
                        class="form-control @error('peso_por_pieza') is-invalid @enderror">
                    @error('peso_por_pieza')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <div class="row mt-3">
                        <div class="col-md-6 d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary">GUARDAR</button>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="{{ route('siguiente_cronograma') }}" class="btn btn-primary">SIGUIENTE</a>
                        </div>
                    </div>
                </form>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <script>
            // Espera a que el DOM esté completamente cargado
            document.addEventListener("DOMContentLoaded", function() {
                // Espera 5 segundos y oculta el mensaje de éxito
                setTimeout(function() {
                    $("#success-message").fadeOut(500); // 500 milisegundos para desaparecer
                }, 5000); // 5000 milisegundos = 5 segundos
            });
            </script>

        </div>
    </div>
</body>

</html>

